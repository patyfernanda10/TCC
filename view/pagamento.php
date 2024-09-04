<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagamento</title>
    <script src="https://www.paypal.com/sdk/js?client-id=AXriV_rZDXrdUfR8EMhNPpDmxMtWTZJcjGRd7X2dCR-b2nFFIUFeMmZKWd0Q02bXfvf-3_1Zk3tlYAqY"></script>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            width: 100%;
            box-sizing: border-box;
        }
        .header {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }
        #paypal-button-container {
            display: inline-block;
            width: auto;
            max-width: 100%;
        }
    </style>
</head>
<body>
    <div class="header">
        <div>
            <h2>Finalize sua doação</h2>
            <div id="paypal-button-container"></div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const urlParams = new URLSearchParams(window.location.search);
            const donationAmount = urlParams.get('donation');

            if (donationAmount) {
                paypal.Buttons({
                    createOrder: function(data, actions) {
                        return actions.order.create({
                            purchase_units: [{
                                amount: {
                                    value: donationAmount
                                }
                            }]
                        });
                    },
                    onApprove: function(data, actions) {
                        return actions.order.capture().then(function(details) {
                            alert('Pagamento realizado com sucesso!');
                            fetch('processa_pagamento.php', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                },
                                body: JSON.stringify({
                                    valor: donationAmount,
                                    transacao_id: data.orderID
                                })
                            }).then(response => response.text())
                              .then(result => {
                                  console.log('Success:', result);
                                  // Opcional: Redirecionar para uma página de agradecimento
                              })
                              .catch(error => {
                                  console.error('Error:', error);
                              });
                        });
                    }
                }).render('#paypal-button-container');
            } else {
                alert('Valor da doação não especificado.');
            }
        });
    </script>
</body>
</html>
