<?php
global $calc_monthlypayment_count;

$labelClass = "";
$inputClass = "";
$spanClass = "";
$mainClass = "";
$inwidget = mortage_calc_inwidget('monthlypayment', $calc_monthlypayment_count);
if($inwidget) {
    $labelClass = "full-label";
    $inputClass = " full-input";
    $spanClass = " full-span";
    $mainClass = " mortgage-calculator-inwidget";
}
?>

<div class="mortgage-calculator mortgage-calculator-monthlypayment<?php echo $mainClass; ?>">
    <h3 class="mortgage-calculator-title mortgage-calculator-monthlypayment-title">Monthly Payment Calculator</h3>
    <span class="mortgage-calculator-details mortgage-calculator-monthlypayment-details">
        This calculator will allow you to figure out your estimated payment for different loan amounts, interest rates, and terms.<br/>
        Annual tax and insurance are optional, and not required to calculate your monthly loan payment.
    </span>
    <div class="mortgage-calculator-input-container mortgage-calculator-monthlypayment-input-container">
        <span class="mortgage-calculator-input-container-title mortgage-calculator-monthlypayment-input-container-title">
            <?php echo ($inwidget) ? "Input Details" : "Calculation Details Input"; ?>
        </span>
        <div class="mortgage-calculator-input-container-row mortgage-calculator-monthlypayment-input-container-row">
            <label for="monthlypayment-years-<?php echo $calc_monthlypayment_count; ?>" class="<?php echo $labelClass; ?>">
                Years:
            </label>
            <input type="text" id="monthlypayment-years-<?php echo $calc_monthlypayment_count; ?>" onchange="mortgage_calc_monthlyPayment('<?php echo $calc_monthlypayment_count; ?>');" onkeypress="return onlyNum(this, event);" class="mortage-calculator-input mortage-calculator-monthlypayment-input<?php echo $inputClass; ?>" />
            <div class="cl"></div>
        </div>
        <div class="mortgage-calculator-input-container-row mortgage-calculator-monthlypayment-input-container-row">
            <label for="monthlypayment-interestrate-<?php echo $calc_monthlypayment_count; ?>" class="<?php echo $labelClass; ?>">
                Interest Rate:
            </label>
            <input type="text" id="monthlypayment-interestrate-<?php echo $calc_monthlypayment_count; ?>" onchange="mortgage_calc_monthlyPayment('<?php echo $calc_monthlypayment_count; ?>');" onkeypress="return onlyNum(this, event);" class="mortage-calculator-input mortage-calculator-monthlypayment-input<?php echo $inputClass; ?>" />
            <div class="cl"></div>
        </div>
        <div class="mortgage-calculator-input-container-row mortgage-calculator-monthlypayment-input-container-row">
            <label for="monthlypayment-loanamount-<?php echo $calc_monthlypayment_count; ?>" class="<?php echo $labelClass; ?>">
                Loan Amount (Principal):
            </label>
            <input type="text" id="monthlypayment-loanamount-<?php echo $calc_monthlypayment_count; ?>" onchange="mortgage_calc_monthlyPayment('<?php echo $calc_monthlypayment_count; ?>');" onkeypress="return onlyNum(this, event);" class="mortage-calculator-input mortage-calculator-monthlypayment-input<?php echo $inputClass; ?>" />
            <div class="cl"></div>
        </div>
        <div class="mortgage-calculator-input-container-row mortgage-calculator-monthlypayment-input-container-row">
            <label for="monthlypayment-annualtax-<?php echo $calc_monthlypayment_count; ?>" class="<?php echo $labelClass; ?>">
                Annual Tax (Optional):
            </label>
            <input type="text" id="monthlypayment-annualtax-<?php echo $calc_monthlypayment_count; ?>" onchange="mortgage_calc_monthlyPayment('<?php echo $calc_monthlypayment_count; ?>');" onkeypress="return onlyNum(this, event);" class="mortage-calculator-input mortage-calculator-monthlypayment-input<?php echo $inputClass; ?>" />
            <div class="cl"></div>
        </div>
        <div class="mortgage-calculator-input-container-row mortgage-calculator-monthlypayment-input-container-row">
            <label for="monthlypayment-annualinsurance-<?php echo $calc_monthlypayment_count; ?>" class="<?php echo $labelClass; ?>">
                Annual Insurance (Optional):
            </label>
            <input type="text" id="monthlypayment-annualinsurance-<?php echo $calc_monthlypayment_count; ?>" onchange="mortgage_calc_monthlyPayment('<?php echo $calc_monthlypayment_count; ?>');" onkeypress="return onlyNum(this, event);" class="mortage-calculator-input mortage-calculator-monthlypayment-input<?php echo $inputClass; ?>" />
            <div class="cl"></div>
        </div>
    </div>
    <button class="mortage-calculator-calculate-button mortage-calculator-interestonly-calculate-button" onclick="return mortgage_calc_monthlyPayment('<?php echo $calc_monthlypayment_count; ?>');">
        Calculate
    </button>
    <div class="cl"></div>
    <div class="mortgage-calculator-output-container mortgage-calculator-monthlypayment-output-container">
        <span class="mortgage-calculator-output-container-title mortgage-calculator-monthlypayment-output-container-title">
            <?php echo ($inwidget) ? "Output Details" : "Calculation Details Output"; ?>
        </span>
        <div class="mortgage-calculator-output-container-row mortgage-calculator-monthlypayment-output-container-row">
            <label class="<?php echo $labelClass; ?>">
                Principal + Interest Payment:
            </label>
            <span id="monthlypayment-outputdata-principalinterest-<?php echo $calc_monthlypayment_count; ?>" class="mortage-calculator-outputdata mortage-calculator-monthlypayment-outputdata<?php echo $spanClass; ?>">$0.00</span>
            <div class="cl"></div>
        </div>
        <div class="mortgage-calculator-output-container-row mortgage-calculator-monthlypayment-output-container-row">
            <label class="<?php echo $labelClass; ?>">
                Monthly Tax Payment:
            </label>
            <span id="monthlypayment-outputdata-monthlytax-<?php echo $calc_monthlypayment_count; ?>" class="mortage-calculator-outputdata mortage-calculator-monthlypayment-outputdata<?php echo $spanClass; ?>">$0.00</span>
            <div class="cl"></div>
        </div>
        <div class="mortgage-calculator-output-container-row mortgage-calculator-monthlypayment-output-container-row">
            <label class="<?php echo $labelClass; ?>">
                Monthly Insurance Payment:
            </label>
            <span id="monthlypayment-outputdata-monthlyinsurance-<?php echo $calc_monthlypayment_count; ?>" class="mortage-calculator-outputdata mortage-calculator-monthlypayment-outputdata<?php echo $spanClass; ?>">$0.00</span>
            <div class="cl"></div>
        </div>
        <div class="mortgage-calculator-output-container-row mortgage-calculator-monthlypayment-output-container-row">
            <label class="<?php echo $labelClass; ?>">
                Total Monthly Payment:
            </label>
            <span id="monthlypayment-outputdata-monthlypayment-<?php echo $calc_monthlypayment_count; ?>" class="mortage-calculator-outputdata mortage-calculator-monthlypayment-outputdata<?php echo $spanClass; ?>">$0.00</span>
            <div class="cl"></div>
        </div>
        <div class="mortgage-calculator-output-container-row mortgage-calculator-monthlypayment-output-container-row">
            <label class="<?php echo $labelClass; ?>">
                Total Payments:
            </label>
            <span id="monthlypayment-outputdata-monthlypayments-<?php echo $calc_monthlypayment_count; ?>" class="mortage-calculator-outputdata mortage-calculator-monthlypayment-outputdata<?php echo $spanClass; ?>">$0.00</span>
            <div class="cl"></div>
        </div>
    </div>
    <div class="cl"></div>
</div>