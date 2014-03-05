<?php
global $calc_interestonly_count;

$labelClass = "";
$inputClass = "";
$spanClass = "";
$mainClass = "";
$inwidget = mortage_calc_inwidget('interestonly', $calc_interestonly_count);
if($inwidget) {
    $labelClass = "full-label";
    $inputClass = " full-input";
    $spanClass = " full-span";
    $mainClass = " mortgage-calculator-inwidget";
}
?>

<div class="mortgage-calculator mortgage-calculator-monthlypayment<?php echo $mainClass; ?>">
    <h3 class="mortgage-calculator-title mortgage-calculator-interestonly-title">Interest Only Payment Calculator</h3>
    <span class="mortgage-calculator-details mortgage-calculator-interestonly-details">
        This calculator will compute a loan's monthly interest-only payment.
    </span>
    <div class="mortgage-calculator-input-container mortgage-calculator-interestonly-input-container">
        <span class="mortgage-calculator-input-container-title mortgage-calculator-interestonly-input-container-title">
            <?php echo ($inwidget) ? "Input Details" : "Calculation Details Input"; ?>
        </span>
        <div class="mortgage-calculator-input-container-row mortgage-calculator-interestonly-input-container-row">
            <label for="interestonly-principal-<?php echo $calc_interestonly_count; ?>" class="<?php echo $labelClass; ?>">
                Principal Balance:
            </label>
            <input type="text" id="interestonly-principal-<?php echo $calc_interestonly_count; ?>" onchange="mortgage_calc_interestOnly('<?php echo $calc_interestonly_count; ?>');" onkeypress="return onlyNum(this, event);" class="mortage-calculator-input mortage-calculator-interestonly-input<?php echo $inputClass; ?>" />
            <div class="cl"></div>
        </div>
        <div class="mortgage-calculator-input-container-row mortgage-calculator-interestonly-input-container-row">
            <label for="interestonly-interestrate-<?php echo $calc_interestonly_count; ?>" class="<?php echo $labelClass; ?>">
                Interest Rate:
            </label>
            <input type="text" id="interestonly-interestrate-<?php echo $calc_interestonly_count; ?>" onchange="mortgage_calc_interestOnly('<?php echo $calc_interestonly_count; ?>');" onkeypress="return onlyNum(this, event);" class="mortage-calculator-input mortage-calculator-interestonly-input<?php echo $inputClass; ?>" />
            <div class="cl"></div>
        </div>
    </div>
    <button class="mortage-calculator-calculate-button mortage-calculator-interestonly-calculate-button" onclick="return mortgage_calc_interestOnly('<?php echo $calc_interestonly_count; ?>');">
        Calculate
    </button>
    <div class="cl"></div>
    <div class="mortgage-calculator-output-container mortgage-calculator-interestonly-output-container">
        <span class="mortgage-calculator-output-container-title mortgage-calculator-interestonly-output-container-title">
            <?php echo ($inwidget) ? "Output Details" : "Calculation Details Output"; ?>
        </span>
        <div class="mortgage-calculator-output-container-row mortgage-calculator-interestonly-output-container-row">
            <label class="<?php echo $labelClass; ?>">
                Monthly Interest Payment:
            </label>
            <span id="interestonly-outputdata-interestpayment-<?php echo $calc_interestonly_count; ?>" class="mortage-calculator-outputdata mortage-calculator-interestonly-outputdata<?php echo $spanClass; ?>">0.00</span>
            <div class="cl"></div>
        </div>
    </div>
</div>
