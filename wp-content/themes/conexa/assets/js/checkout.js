const initialState = () => ({
    checkoutFields : checkoutFields,
    planId : window.planId,
    recaptchaSiteKey : window.recaptchaSiteKey,
    personalInfo : {
        name  : '',
        docNumber : '',
        email : ''
    },
    paymentInfo : {
        method : checkoutFields.payment_methods[0],
        creditcard : {
            name: '',
            number : '',
            dueDate : '',
            cvv : '',
        }
    },
    isSubmiting:false,
})

window.checkout = createApp("#checkout", {
    data() {
        return initialState();
    },
    computed : {
        formatedPrice() {
            const price = this.checkoutFields.price;
            const priceFormated = price.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
            return `R$ ${priceFormated}`;
        },
    },
    methods : {
        setPaymentMethod(method) {
            if(this.isSubmiting)  return;
            this.paymentInfo.method = method;
        },
        makeMask(index,mask) {
            const content = eval(`this.${index}`)
            const val =  this.formatValueWithMask(content,mask);
            eval(`this.${index} = '${val}'`)
        },
        formatValueWithMask(value,mask) {
            value = value.replace(/\D/g, "");
            let formattedValue = "";
            value = String(value);
            let valueIndex = 0;
            for (let i = 0; i < mask.length; i++) {
                if (mask.charAt(i) === "#") {
                    if (valueIndex < value.length) {
                        formattedValue += value.charAt(valueIndex);
                        valueIndex++;
                    } else {
                        break;
                    }
                } else {
                    formattedValue += mask.charAt(i);
                }
            }
            return formattedValue;
        },
        validName() {
            const validMessage = 'Digite o nome completo';
            const name = this.personalInfo.name;
            const qtdWords = name.split(' ').length;
            if(qtdWords < 2) {
                this.error(validMessage);
                throw new Error(validMessage);
            }
        },
        validEmail() {
            const validMessage = 'Email inválido';
            const email = this.personalInfo.email;
            const regex = /^[a-z0-9.]+@[a-z0-9]+\.[a-z]+(\.[a-z]+)?$/i;
            if(!regex.test(email)) {
                this.error(validMessage);
                throw new Error(validMessage);
            }
        },
        validCPF() {
            const validMessage = 'CPF inválido';
            const cpf = this.personalInfo.docNumber;
            const regex = /^\d{3}\.\d{3}\.\d{3}\-\d{2}$/;
            if(!regex.test(cpf)) {
                this.error(validMessage);
                throw new Error(validMessage);
            }
        },
        validCreditCard() {
            let validMessage = 'Cartão de crédito inválido';
            const creditcard = this.paymentInfo.creditcard;
            if(creditcard.number.length<19) {
                this.error(validMessage);
                throw new Error(validMessage);
            }
            validMessage = 'Vencimento inválido';
            const dueDate = creditcard.dueDate;
            const dueDateRegex = /^\d{2}\/\d{2}$/;
            if(!dueDateRegex.test(dueDate)) {
                this.error(validMessage);
                throw new Error(validMessage);
            }
            validMessage = 'cvv inválido';
            const cvv = creditcard.cvv;
            const cvvRegex = /^\d{3,4}$/;
            if(!cvvRegex.test(cvv)) {
                this.error(validMessage);
                throw new Error(validMessage);
            }
            validMessage = 'Nome do cartão inválido';
            const name = creditcard.name;
            const nameRegex = /^[a-z\s]+$/i;
            if(!nameRegex.test(name)) {
                this.error(validMessage);
                throw new Error(validMessage);
            }
        },
        validPaymentInfo() {
            if(this.paymentInfo.method === 'Cartão de crédito') {
                this.validCreditCard();
            }
        },
        validPersonalInfos(){
            this.validName();
            this.validEmail();
            this.validCPF();
            this.validPaymentInfo();
        },
        validInfos(){
            this.validPersonalInfos();
        },
        error(text) {
            Swal.fire({
                title: 'Atenção!',
                html: text,
                icon: 'warning',
            })
        },
        confirm(text,callback) {
            Swal.fire({
                title: text,
                icon: 'question',
                showDenyButton: true,
                confirmButtonText: 'Sim',
                denyButtonText: `Não`,
              }).then((result) => {
                if (result.isConfirmed) {
                    callback();
                }
              })
        },
        success(text) {
            Swal.fire({
                title: 'Sucesso!',
                html: text,
                icon: 'success',
            })
        },
        resetState(){
            Object.assign(this.$data, initialState());
        },
        submit() {
            this.validInfos();
            this.confirm('Finalizar pagamento ?',() => {
                grecaptcha.enterprise.ready(async () => {
                    const recaptchaToken = await grecaptcha.enterprise.execute(this.recaptchaSiteKey, {action: 'checkout'});
                    this.isSubmiting = true;
                    const payload ={ ...this.$data,recaptchaToken};
                    console.log(payload)
                    fetch('/wp-json/api/subscription',{
                        method: 'POST',
                        headers: {
                            accept: 'application/json', 
                            'content-type': 'application/json',
                        },
                        body: JSON.stringify(payload)
                    }).then(response => response.json())
                        .then(response => {
                            if(response.status === 'success') {
                                this.success("Pagamento realizado com sucesso");
                                this.resetState();
                            } else if(response.error) {
                                this.error(response.error);
                            }
                            this.isSubmiting = false;
                        })
                        .catch(err => {
                            this.error(err.message);
                            this.isSubmiting = false;
                        });
                });
            });
           
        }
    }
})