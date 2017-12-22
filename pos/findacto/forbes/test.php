<fieldset class="scheduler-border">
    <legend class="scheduler-border">Pay</legend>
    <form class="form-inline" method="post" action="process-paypal.php">
        <input id="fname" tabindex="1" maxlength="20" size="20" name="fname" type="hidden"/>
        <input id="lname" tabindex="2" maxlength="12" size="12" name="lname" type="hidden" autocomplete="off" value="CUST001">
        <input id="country" tabindex="4" maxlength="12" size="12" type="hidden"  name="country">
        <input id="cc" tabindex="4" maxlength="12" size="12" type="hidden" name="cc" value="****">
        <div class="form-group">
            <label for="exampleInputName2">Amount : </label>
            <div class="input-group">
                <span class="input-group-addon">$</i>
</span>
                <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" name="amount" id="amount">
            </div>
        </div>
        <button type="submit" id="TXN_AMOUNT" name="TXN_AMOUNT" class="btn btn-primary"><i class="fa fa-credit-card"" aria-hidden="true"></i> Pay</button>
    </form>
</fieldset>