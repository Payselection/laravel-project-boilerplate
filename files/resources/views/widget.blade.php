<script type="text/javascript" src="https://widget.payselection.com/lib/pay-widget.js"></script>
<script type="text/javascript">
    this.pay = function(payment_data) {
        var widget = new pw.PayWidget();
        widget.pay({
                serviceId: payment_data.serviceId,
                key: payment_data.publicKey,
                logger: true,
            },
            payment_data.data,
            // См. запрос Create
            {
                // Варианты ключей которые могут приходить по колбекам:
                // для onSuccess -> PAY_WIDGET:TRANSACTION_SUCCESS, PAY_WIDGET:CLOSE_AFTER_SUCCESS
                // для onError -> PAY_WIDGET:TRANSACTION_FAIL, PAY_WIDGET:CREATE_NETWORK_ERROR, PAY_WIDGET:CREATE_BAD_REQUEST_ERROR, PAY_WIDGET:CLOSE_AFTER_FAIL,PAY_WIDGET:CLOSE_AFTER_CREATE_NETWORK_ERROR, PAY_WIDGET:CREATE_BAD_REQUEST_ERROR   
                // для onClose -> PAY_WIDGET:CLOSE_BEFORE_PAY
                onSuccess: function(res) {
                    console.log("onSuccess from shop", res);
                    if (res.returnUrl)
                        window.location.href = res.returnUrl;
                },
                onError: function(res) {
                    console.log("onFail from shop", res);
                    if (res.returnUrl)
                        window.location.href = res.returnUrl;
                },
                onClose: function(res) {
                    console.log("onClose from shop", res);
                },
            },
        );
    };
    document.addEventListener("DOMContentLoaded", function(event) {
        if(widget_payment_data !== null) {
            pay(widget_payment_data);
        } else {
            console.error('var widget_payment_data = null');
        }
    });
</script>
