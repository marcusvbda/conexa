window.checkout = createApp("#checkout", {
    data() {
        return {
            checkoutFields : checkoutFields,
            personalInfo : {
                name  : 'Solaire of Astora',
                docNumber : '111.111.111-11',
                email : 'email@email.com'
            },
            paymentInfo : {
                method : checkoutFields.payment_methods[0],
                creditcard : {
                    name: 'SOLAIRE OF ASTORA',
                    number : '4242 4242 424242 42424',
                    dueDate : '01/2024',
                    cvv : '123',
                }
            },
            isSubmiting:false,
            provider : {
                url : 'https://api.pagar.me',
                userName: 'mvbassalobre',
                password : 'passcode'
            }
        }
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
            if(creditcard.number.length<22) {
                this.error(validMessage);
                throw new Error(validMessage);
            }

            validMessage = 'Vencimento inválido';
            const dueDate = creditcard.dueDate;
            const dueDateRegex = /^\d{2}\/\d{4}$/;
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
                text: text,
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
        getPaymentMethod() {
            const options ={
                "Cartão de crédito": "credit_card",
            }
            return options[this.paymentInfo.method] || '';
        },
        getInterVal() {
            const options ={
                "Recorrente": "month",
            }
            return options[this.checkoutFields.type] || '';
        },
        getInterValCount() {
            const options = {
                "Recorrente": 12,
            }
            return options[this.checkoutFields.type] || 1;
        },
        getUrl() {
            const url = this.provider.url;
            const options = {
                "Recorrente": 'core/v5/subscriptions',
            }
            const endpoint = options[this.checkoutFields.type]
            return `${url}/${endpoint}`;
        },
        getAuthorization() {
            const userName = this.provider.userName;
            const password = this.provider.password;
            const auth = `${userName}:${password}`;
            return `Basic ${btoa(auth)}`;
        },
        makePaymentPayload() {
            let body = {
                payment_method: this.getPaymentMethod(),
                interval: this.getInterVal(),
                minimum_price: null,
                interval_count: this.getInterValCount(),
                billing_type: 'prepaid',//postpaid, exact_day
                installments: 1,
                pricing_scheme: {scheme_type: 'Unit'},
                quantity: null,
                statement_descriptor: this.checkoutFields.soft_descriptor,
                customer : {
                    name : this.personalInfo.name,
                    email : this.personalInfo.email,
                    document : this.personalInfo.docNumber,
                    document_type : 'CPF'
                },
                items : [
                    {
                      name : this.checkoutFields.name,
                      quantity : 1,
                      description : this.checkoutFields.soft_descriptor,
                    }
                ]
            }

            if(this.paymentInfo.method === 'Cartão de crédito') {
                body.card  = {
                    number: this.paymentInfo.creditcard.number,
                    holder_name: this.paymentInfo.creditcard.name.toUpperCase(),
                    holder_document: this.personalInfo.docNumber,
                    exp_month: this.paymentInfo.creditcard.dueDate.split('/')[0],
                    exp_year: this.paymentInfo.creditcard.dueDate.split('/')[1],
                    cvv: this.paymentInfo.creditcard.cvv,
                }
            }

            const payload = {
                method: 'POST',
                headers: {
                    accept: 'application/json', 
                    'content-type': 'application/json',
                    authorization: this.getAuthorization()
                },
                body: JSON.stringify(body)
            }
            return payload;
        },
        submit() {
            this.confirm('Finalizar pagamento ?',() => {
                this.validInfos();
                this.isSubmiting = true;
                const payload = this.makePaymentPayload();

                  fetch(this.getUrl(), payload)
                    .then(response => response.json())
                    .then(response => console.log(response))
                    .catch(err => console.error(err));
            })
        }
    }
})