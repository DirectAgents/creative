<?php
global $calc_refinancing_count;

$labelClass = "";
$inputClass = "";
$spanClass = "";
$mainClass = "";
$inwidget = mortage_calc_inwidget('refinancing', $calc_refinancing_count);
if($inwidget) {
    $labelClass = "full-label";
    $inputClass = " full-input";
    $spanClass = " full-span";
    $mainClass = " mortgage-calculator-inwidget";
}
?>

<div class="mortgage-calculator mortgage-calculator-monthlypayment<?php echo $mainClass; ?>">
    <h3 class="mortgage-calculator-title mortgage-calculator-refinancing-title">Mortgage Refinancing Calculator</h3>
    <span class="mortgage-calculator-details mortgage-calculator-refinancing-details">
        This calculator will help you to decide whether or not you should refinance your current mortgage at a lower interest rate. Not only will this calculator calculate the monthly payment and net interest savings, but it will also calculate how many months it will take to break even on the closing costs.
    </span>
    <div class="mortgage-calculator-input-container mortgage-calculator-refinancing-input-container">
        <span class="mortgage-calculator-input-container-title mortgage-calculator-refinancing-input-container-title">
            <?php echo ($inwidget) ? "Input Details" : "Calculation Details Input"; ?>
        </span>
        <div class="mortgage-calculator-input-container-row mortgage-calculator-refinancing-input-container-row">
            <label for="refinancing-currentbalance-<?php echo $calc_refinancing_count; ?>" class="<?php echo $labelClass; ?>">
                Current Principal Balance:
            </label>
            <input type="text" id="refinancing-currentbalance-<?php echo $calc_refinancing_count; ?>" onchange="mortgage_calc_refinancing('<?php echo $calc_refinancing_count; ?>');" onkeypress="return onlyNum(this, event);" class="mortage-calculator-input mortage-calculator-refinancing-input<?php echo $inputClass; ?>" />
            <div class="cl"></div>
        </div>
        <div class="mortgage-calculator-input-container-row mortgage-calculator-refinancing-input-container-row">
            <label for="refinancing-monthlypayment-<?php echo $calc_refinancing_count; ?>" class="<?php echo $labelClass; ?>">
                Current Monthly Payment:
            </label>
            <input type="text" id="refinancing-monthlypayment-<?php echo $calc_refinancing_count; ?>" onchange="mortgage_calc_refinancing('<?php echo $calc_refinancing_count; ?>');" onkeypress="return onlyNum(this, event);" class="mortage-calculator-input mortage-calculator-refinancing-input<?php echo $inputClass; ?>" />
            <div class="cl"></div>
        </div>
        <div class="mortgage-calculator-input-container-row mortgage-calculator-refinancing-input-container-row">
            <label for="refinancing-interestrate-<?php echo $calc_refinancing_count; ?>" class="<?php echo $labelClass; ?>">
                Current Interest Rate:
            </label>
            <input type="text" id="refinancing-interestrate-<?php echo $calc_refinancing_count; ?>" onchange="mortgage_calc_refinancing('<?php echo $calc_refinancing_count; ?>');" onkeypress="return onlyNum(this, event);" class="mortage-calculator-input mortage-calculator-refinancing-input<?php echo $inputClass; ?>" />
            <div class="cl"></div>
        </div>
        <div class="mortgage-calculator-input-container-row mortgage-calculator-refinancing-input-container-row">
            <label for="refinancing-newinterestrate-<?php echo $calc_refinancing_count; ?>" class="<?php echo $labelClass; ?>">
                New Interest Rate:
            </label>
            <input type="text" id="refinancing-newinterestrate-<?php echo $calc_refinancing_count; ?>" onchange="mortgage_calc_refinancing('<?php echo $calc_refinancing_count; ?>');" onkeypress="return onlyNum(this, event);" class="mortage-calculator-input mortage-calculator-refinancing-input<?php echo $inputClass; ?>" />
            <div class="cl"></div>
        </div>
        <div class="mortgage-calculator-input-container-row mortgage-calculator-refinancing-input-container-row">
            <label for="refinancing-newloanterm-<?php echo $calc_refinancing_count; ?>" class="<?php echo $labelClass; ?>">
                New Loan Term (# Years):
            </label>
            <input type="text" id="refinancing-newloanterm-<?php echo $calc_refinancing_count; ?>" onchange="mortgage_calc_refinancing('<?php echo $calc_refinancing_count; ?>');" onkeypress="return onlyNum(this, event);" class="mortage-calculator-input mortage-calculator-refinancing-input<?php echo $inputClass; ?>" />
            <div class="cl"></div>
        </div>
        <div class="mortgage-calculator-input-container-row mortgage-calculator-refinancing-input-container-row">
            <label for="refinancing-closingcosts-<?php echo $calc_refinancing_count; ?>" class="<?php echo $labelClass; ?>">
                Closing Costs:
            </label>
            <input type="text" id="refinancing-closingcosts-<?php echo $calc_refinancing_count; ?>" onchange="mortgage_calc_refinancing('<?php echo $calc_refinancing_count; ?>');" onkeypress="return onlyNum(this, event);" class="mortage-calculator-input mortage-calculator-refinancing-input<?php echo $inputClass; ?>" />
            <div class="cl"></div>
        </div>
        <div class="mortgage-calculator-input-container-row mortgage-calculator-refinancing-input-container-row">
            <label for="refinancing-closingcoststype-<?php echo $calc_refinancing_count; ?>" class="<?php echo $labelClass; ?>">
                Type of Closing Costs:
            </label>
            <select id="refinancing-closingcoststype-<?php echo $calc_refinancing_count; ?>" onchange="mortgage_calc_refinancing('<?php echo $calc_refinancing_count; ?>');" class="mortage-calculator-input mortage-calculator-refinancing-input<?php echo $inputClass; ?>">
                <option value="0">Percentage Points</option>
                <option value="1">Dollar Amount</option>
            </select>
            <div class="cl"></div>
        </div>
        <div class="mortgage-calculator-input-container-row mortgage-calculator-refinancing-input-container-row">
            <label for="refinancing-financeclosingcosts-<?php echo $calc_refinancing_count; ?>" class="<?php echo $labelClass; ?>">
                Finance Closing Costs?
            </label>
            <select id="refinancing-financeclosingcosts-<?php echo $calc_refinancing_count; ?>" onchange="mortgage_calc_refinancing('<?php echo $calc_refinancing_count; ?>');" class="mortage-calculator-input mortage-calculator-refinancing-input<?php echo $inputClass; ?>">
                <option value="0">No</option>
                <option value="1">Yes</option>
            </select>
            <div class="cl"></div>
        </div>
    </div>
    <button class="mortage-calculator-calculate-button mortage-calculator-refinancing-calculate-button" onclick="return mortgage_calc_refinancing('<?php echo $calc_refinancing_count; ?>');">
        Calculate
    </button>
    <div class="cl"></div>
    <div class="mortgage-calculator-output-container mortgage-calculator-refinancing-output-container">
        <span class="mortgage-calculator-output-container-title mortgage-calculator-refinancing-output-container-title">
            <?php echo ($inwidget) ? "Output Details" : "Calculation Details Output"; ?>
        </span>
        <div class="mortgage-calculator-output-container-row mortgage-calculator-refinancing-output-container-row">
            <label class="<?php echo $labelClass; ?>">
                Net Savings:
            </label>
            <span id="refinancing-outputdata-netsavings-<?php echo $calc_refinancing_count; ?>" class="mortage-calculator-outputdata mortage-calculator-refinancing-outputdata<?php echo $spanClass; ?>">$0.00</span>
            <div class="cl"></div>
        </div>
        <div class="mortgage-calculator-output-container-row mortgage-calculator-refinancing-output-container-row">
            <label class="<?php echo $labelClass; ?>">
                Monthly Savings:
            </label>
            <span id="refinancing-outputdata-monthlysavings-<?php echo $calc_refinancing_count; ?>" class="mortage-calculator-outputdata mortage-calculator-refinancing-outputdata<?php echo $spanClass; ?>">$0.00</span>
            <div class="cl"></div>
        </div>
        <div class="mortgage-calculator-output-container-row mortgage-calculator-refinancing-output-container-row">
            <label class="<?php echo $labelClass; ?>">
                Break-Even Time:
            </label>
            <span id="refinancing-outputdata-breakeventime-<?php echo $calc_refinancing_count; ?>" class="mortage-calculator-outputdata mortage-calculator-refinancing-outputdata<?php echo $spanClass; ?>">0</span>
            <div class="cl"></div>
        </div>
        <div class="mortgage-calculator-output-container-row mortgage-calculator-refinancing-output-container-row">
            <label class="<?php echo $labelClass; ?>">
                Total Current Interest:
            </label>
            <span id="refinancing-outputdata-totalcurinterest-<?php echo $calc_refinancing_count; ?>" class="mortage-calculator-outputdata mortage-calculator-refinancing-outputdata<?php echo $spanClass; ?>">$0.00</span>
            <div class="cl"></div>
        </div>
        <div class="mortgage-calculator-output-container-row mortgage-calculator-refinancing-output-container-row">
            <label class="<?php echo $labelClass; ?>">
                Total New Interest:
            </label>
            <span id="refinancing-outputdata-totalnewinterest-<?php echo $calc_refinancing_count; ?>" class="mortage-calculator-outputdata mortage-calculator-refinancing-outputdata<?php echo $spanClass; ?>">$0.00</span>
            <div class="cl"></div>
        </div>
        <div class="mortgage-calculator-output-container-row mortgage-calculator-refinancing-output-container-row">
            <label class="<?php echo $labelClass; ?>">
                New Monthly Payment:
            </label>
            <span id="refinancing-outputdata-newmonthlypayment-<?php echo $calc_refinancing_count; ?>" class="mortage-calculator-outputdata mortage-calculator-refinancing-outputdata<?php echo $spanClass; ?>">$0.00</span>
            <div class="cl"></div>
        </div>
    </div>
</div>
