<?php
global $calc_termcomparison_count;

$labelClass = "";
$inputClass = "";
$spanClass = "";
$mainClass = "";
$inwidget = mortage_calc_inwidget('termcomparison', $calc_termcomparison_count);
if($inwidget) {
    $labelClass = "full-label";
    $inputClass = " full-input";
    $spanClass = " full-span";
    $mainClass = " mortgage-calculator-inwidget";
}
?>

<div class="mortgage-calculator mortgage-calculator-monthlypayment<?php echo $mainClass; ?>">
    <h3 class="mortgage-calculator-title mortgage-calculator-termcomparison-title">Mortgage Term Comparison Calculator</h3>
    <span class="mortgage-calculator-details mortgage-calculator-termcomparison-details">
        This calculator will allow you to figure out your estimated payment for different loan amounts, interest rates, and terms.<br/>
        Annual tax and insurance are optional, and not required to calculate your monthly loan payment.This calculator will help you to decide whether or not you should refinance your current mortgage at a lower interest rate. Not only will this calculator calculate the monthly payment and net interest savings, but it will also calculate how many months it will take to break even on the closing costs.
    </span>
    <div class="mortgage-calculator-input-container mortgage-calculator-termcomparison-input-container">
        <span class="mortgage-calculator-input-container-title mortgage-calculator-termcomparison-input-container-title">
            <?php echo ($inwidget) ? "Input Details" : "Calculation Details Input"; ?>
        </span>
        <div class="mortgage-calculator-input-container-row mortgage-calculator-termcomparison-input-container-row">
            <label for="termcomparison-principal-<?php echo $calc_termcomparison_count; ?>" class="<?php echo $labelClass; ?>">
                Mortgage Principal:
            </label>
            <input type="text" id="termcomparison-principal-<?php echo $calc_termcomparison_count; ?>" onchange="mortgage_calc_termComparison('<?php echo $calc_termcomparison_count; ?>');" onkeypress="return onlyNum(this, event);" class="mortage-calculator-input mortage-calculator-termcomparison-input<?php echo $inputClass; ?>" />
            <div class="cl"></div>
        </div>
        <div class="mortgage-calculator-input-container-row mortgage-calculator-termcomparison-input-container-row">
            <label for="termcomparison-interestrate-<?php echo $calc_termcomparison_count; ?>" class="<?php echo $labelClass; ?>">
                Expected Annual Interest Rate:
            </label>
            <input type="text" id="termcomparison-interestrate-<?php echo $calc_termcomparison_count; ?>" onchange="mortgage_calc_termComparison('<?php echo $calc_termcomparison_count; ?>');" onkeypress="return onlyNum(this, event);" class="mortage-calculator-input mortage-calculator-termcomparison-input<?php echo $inputClass; ?>" />
            <div class="cl"></div>
        </div>
    </div>
    <button class="mortage-calculator-calculate-button mortage-calculator-termcomparison-calculate-button" onclick="return mortgage_calc_termComparison('<?php echo $calc_termcomparison_count; ?>');">
        Calculate
    </button>
    <div class="cl"></div>
    <div class="mortgage-calculator-output-container mortgage-calculator-termcomparison-output-container">
        <span class="mortgage-calculator-output-container-title mortgage-calculator-termcomparison-output-container-title">
            <?php echo ($inwidget) ? "Output Details" : "Calculation Details Output"; ?>
        </span>
        <div class="mortgage-calculator-output-container-tablerow mortgage-calculator-termcomparison-output-container-tablerow">
            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr>
                    <th>Years</th>
                    <th>Monthly Payment</th>
                    <th>Total Principal</th>
                    <th>Total Interest</th>
                    <th>Total Payments</th>
                </tr>
                <tr>
                    <td class="row-table-index">10</td>
                    <td><span id="termcomparison-outputdata-monthlypayment10-<?php echo $calc_termcomparison_count; ?>" class="mortage-calculator-table-span">0.00</span></td>
                    <td><span id="termcomparison-outputdata-totalprincipal10-<?php echo $calc_termcomparison_count; ?>" class="mortage-calculator-table-span">0.00</span></td>
                    <td><span id="termcomparison-outputdata-totalinterest10-<?php echo $calc_termcomparison_count; ?>" class="mortage-calculator-table-span">0.00</span></td>
                    <td><span id="termcomparison-outputdata-totalpayments10-<?php echo $calc_termcomparison_count; ?>" class="mortage-calculator-table-span">0.00</span></td>
                </tr>
                <tr>
                    <td class="row-table-index">15</td>
                    <td><span id="termcomparison-outputdata-monthlypayment15-<?php echo $calc_termcomparison_count; ?>" class="mortage-calculator-table-span">0.00</span></td>
                    <td><span id="termcomparison-outputdata-totalprincipal15-<?php echo $calc_termcomparison_count; ?>" class="mortage-calculator-table-span">0.00</span></td>
                    <td><span id="termcomparison-outputdata-totalinterest15-<?php echo $calc_termcomparison_count; ?>" class="mortage-calculator-table-span">0.00</span></td>
                    <td><span id="termcomparison-outputdata-totalpayments15-<?php echo $calc_termcomparison_count; ?>" class="mortage-calculator-table-span">0.00</span></td>
                </tr>
                <tr>
                    <td class="row-table-index">20</td>
                    <td><span id="termcomparison-outputdata-monthlypayment20-<?php echo $calc_termcomparison_count; ?>" class="mortage-calculator-table-span">0.00</span></td>
                    <td><span id="termcomparison-outputdata-totalprincipal20-<?php echo $calc_termcomparison_count; ?>" class="mortage-calculator-table-span">0.00</span></td>
                    <td><span id="termcomparison-outputdata-totalinterest20-<?php echo $calc_termcomparison_count; ?>" class="mortage-calculator-table-span">0.00</span></td>
                    <td><span id="termcomparison-outputdata-totalpayments20-<?php echo $calc_termcomparison_count; ?>" class="mortage-calculator-table-span">0.00</span></td>
                </tr>
                <tr>
                    <td class="row-table-index">25</td>
                    <td><span id="termcomparison-outputdata-monthlypayment25-<?php echo $calc_termcomparison_count; ?>" class="mortage-calculator-table-span">0.00</span></td>
                    <td><span id="termcomparison-outputdata-totalprincipal25-<?php echo $calc_termcomparison_count; ?>" class="mortage-calculator-table-span">0.00</span></td>
                    <td><span id="termcomparison-outputdata-totalinterest25-<?php echo $calc_termcomparison_count; ?>" class="mortage-calculator-table-span">0.00</span></td>
                    <td><span id="termcomparison-outputdata-totalpayments25-<?php echo $calc_termcomparison_count; ?>" class="mortage-calculator-table-span">0.00</span></td>
                </tr>
                <tr>
                    <td class="row-table-index">30</td>
                    <td><span id="termcomparison-outputdata-monthlypayment30-<?php echo $calc_termcomparison_count; ?>" class="mortage-calculator-table-span">0.00</span></td>
                    <td><span id="termcomparison-outputdata-totalprincipal30-<?php echo $calc_termcomparison_count; ?>" class="mortage-calculator-table-span">0.00</span></td>
                    <td><span id="termcomparison-outputdata-totalinterest30-<?php echo $calc_termcomparison_count; ?>" class="mortage-calculator-table-span">0.00</span></td>
                    <td><span id="termcomparison-outputdata-totalpayments30-<?php echo $calc_termcomparison_count; ?>" class="mortage-calculator-table-span">0.00</span></td>
                </tr>
            </table>
        </div>
    </div>
</div>
