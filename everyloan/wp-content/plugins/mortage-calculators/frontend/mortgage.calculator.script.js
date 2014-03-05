numvalids = {"0":'', "1":'', "2":'', "3":'', "4":'', "5":'', "6":'', "7":'', "8":'', "9":'', ".":'', "/":'', "%":''};

function onlyNum(elm, e) {
    var keyCode = e.which;
    if(!keyCode || keyCode==undefined)  keyCode = e.keyCode;
    if(keyCode) {
        var char = String.fromCharCode(keyCode);
        if(char in numvalids)   return true;
        else    return false;
    }
    return false;
}

function mortgage_calc_monthlyPayment(calcIndex) {
    if(!calcIndex || calcIndex==undefined || calcIndex=='') calcIndex = 1;

    var interestRate = getNumberOnly(getFieldValue('monthlypayment', 'interestrate', calcIndex)) / 100.0;
    var loanAmount = getNumberOnly(getFieldValue('monthlypayment', 'loanamount', calcIndex));
    var annualTax = getNumberOnly(getFieldValue('monthlypayment', 'annualtax', calcIndex));
    var annualInsurance = getNumberOnly(getFieldValue('monthlypayment', 'annualinsurance', calcIndex));
    var years = getNumberOnly(getFieldValue('monthlypayment', 'years', calcIndex));
    var months = years * 12;

    var monthlyInterest = interestRate / 12;
    var base = 1;
    var mbase = 1 + monthlyInterest;
    for(var i = 0; i < Math.floor(months); i++)
    {
            base *= mbase;
    }

    var monthlyPrinInt = (loanAmount * monthlyInterest) / (1 - (1 / base));
    var monthlyTax = annualTax / 12;
    var monthlyInsurance = annualInsurance / 12;
    var totalMonthlyPayment = monthlyPrinInt + monthlyTax + monthlyInsurance;

    writeOutputData('monthlypayment', 'principalinterest', calcIndex, formatNumber(monthlyPrinInt, "$"));
    writeOutputData('monthlypayment', 'monthlytax', calcIndex, formatNumber(monthlyTax, "$"));
    writeOutputData('monthlypayment', 'monthlyinsurance', calcIndex, formatNumber(monthlyInsurance, "$"));
    writeOutputData('monthlypayment', 'monthlypayment', calcIndex, formatNumber(totalMonthlyPayment, "$"));
    writeOutputData('monthlypayment', 'monthlypayments', calcIndex, formatNumber(totalMonthlyPayment * months, "$"));
}

function mortgage_calc_refinancing(calcIndex) {
    if(!calcIndex || calcIndex==undefined || calcIndex=='') calcIndex = 1;

    var curBalance = getNumberOnly(getFieldValue('refinancing', 'currentbalance', calcIndex));
    var curMonthlyPmt = getNumberOnly(getFieldValue('refinancing', 'monthlypayment', calcIndex));
    var curInterestRate = getNumberOnly(getFieldValue('refinancing', 'interestrate', calcIndex)) / 100;
    var newInterestRate = getNumberOnly(getFieldValue('refinancing', 'newinterestrate', calcIndex)) / 100;
    var newTerm = getNumberOnly(getFieldValue('refinancing', 'newloanterm', calcIndex));
    var closingCosts = getNumberOnly(getFieldValue('refinancing', 'closingcosts', calcIndex));
    var closingCostsType = getNumberOnly(getFieldValue('refinancing', 'closingcoststype', calcIndex));
    var financeClosingCosts = getNumberOnly(getFieldValue('refinancing', 'financeclosingcosts', calcIndex));

    var months = newTerm * 12;
    var curMonthlyIntRate = curInterestRate / 12;
    var newMonthlyIntRate = newInterestRate / 12;

    if(closingCostsType == 0) {
        closingCosts = curBalance * (closingCosts / 100);
    }

    var principal = curBalance;
    var interestPart = 0;
    var principalPart = 0;
    var accumPrincipal = 0;
    var accumInterest = 0;
    var count = 0;

    while(principal > 0) {
        interestPart = principal * curMonthlyIntRate;
        principalPart = curMonthlyPmt - interestPart;
        principal -= principalPart;
        accumPrincipal += principalPart;
        accumInterest += interestPart;
        count++;
        if(count > 600)
            break;
    }

    var principal2 = curBalance;
    if(financeClosingCosts == 1) {
        principal2 = curBalance + closingCosts;
    }

    var pow = 1;
    for(var i = 0; i < (newTerm * 12); i++)
        pow *= (1 + newMonthlyIntRate);

    var newMonthlyPmt = (principal2 * pow * newMonthlyIntRate) / (pow - 1);
    var monthlySavings = curMonthlyPmt - newMonthlyPmt;
    var totalInterest = (newMonthlyPmt * newTerm * 12) - principal2;
    var interestSaved = Math.max(accumInterest - totalInterest, 0);

    var prin1 = principal;
    var prin2 = curBalance;
    var intPort1 = 0;
    var intPort2 = 0;
    var prinPort1 = 0;
    var prinPort2 = 0;
    var accumInt1 = 0;
    var accumInt2 = 0;
    var accumPrin1 = 0;
    var accumPrin2 = 0;
    var count2 = 0;
    var amortIntSave = 0;

    while(amortIntSave < closingCosts) {
        intPort1 = prin1 * newMonthlyIntRate;
        intPort1 = prin2 * curMonthlyIntRate;
        prinPort1 = newMonthlyPmt - intPort1;
        prinPort2 = curMonthlyPmt - intPort2;
        prin1 = prin1 - prinPort1;
        prin2 = prin2 - prinPort2;
        accumPrin1 = accumPrin1 + prinPort1;
        accumPrin2 = accumPrin2 + prinPort2;
        accumInt1 = accumInt1 + intPort1;
        accumInt2 = accumInt2 + intPort2;
        amortIntSave = accumInt2 - accumInt1;
        count2++;
        if(count2 > 600)
            break;
    }

    var netSavings = interestSaved - closingCosts;
    var breakEvenTime = count2;

    writeOutputData('refinancing', 'totalcurinterest', calcIndex, formatNumber(accumInterest, "$"));
    writeOutputData('refinancing', 'newmonthlypayment', calcIndex, formatNumber(newMonthlyPmt, "$"));
    writeOutputData('refinancing', 'totalnewinterest', calcIndex, formatNumber(totalInterest, "$"));
    writeOutputData('refinancing', 'netsavings', calcIndex, formatNumber(netSavings, "$"));
    writeOutputData('refinancing', 'monthlysavings', calcIndex, formatNumber(monthlySavings, "$"));
    writeOutputData('refinancing', 'breakeventime', calcIndex, breakEvenTime);
}

function mortgage_calc_termComparison(calcIndex) {
    if(!calcIndex || calcIndex==undefined || calcIndex=='') calcIndex = 1;

    var principal = getNumberOnly(getFieldValue('termcomparison', 'principal', calcIndex));
    var interest = getNumberOnly(getFieldValue('termcomparison', 'interestrate', calcIndex)) / 100;
    var monthlyInterest = interest / 12;

    for(var years = 10; years <= 30; years += 5) {
        var months = years * 12;
        var monthlyPayment = principal / months;

        if(interest > 0) {
            // Compute monthly payments
            var tmp = 1;
            for(var i = 0; i < months; i++)
                    tmp *= (1 + monthlyInterest);
            monthlyPayment = (principal * tmp * monthlyInterest) / (tmp - 1);
        }
        writeOutputData('termcomparison', 'monthlypayment' + years, calcIndex, formatNumber(monthlyPayment));

        // Total Principal doesn't change
        writeOutputData('termcomparison', 'totalprincipal' + years, calcIndex, formatNumber(principal));

        var tmpPrin = principal;
        var tmpIntPart = 0;
        var tmpPrnPart = 0;
        var totalInterest = 0;
        var i = 0;
        while(tmpPrin > 0) {
            if(monthlyPayment > (tmpPrin * (1 + monthlyInterest))) {
                // we are on last payment
                tmpIntPart = tmpPrin * monthlyInterest;
                tmpPrnPart = tmpPrin;
                totalInterest += tmpIntPart;
                tmpPrin = 0;
            } else {
                // normal monthly payment
                tmpIntPart = tmpPrin * monthlyInterest;
                totalInterest += tmpIntPart;
                tmpPrnPart = monthlyPayment - tmpIntPart;
                tmpPrin -= tmpPrnPart;
            }

            // make sure it doesnt keep on going indefinitely
            i++;
            if(i > 1000)
                tmpPrin = 0;
        }
        writeOutputData('termcomparison', 'totalinterest' + years, calcIndex, formatNumber(totalInterest));
        writeOutputData('termcomparison', 'totalpayments' + years, calcIndex, formatNumber(principal + totalInterest));
    }
}

function mortgage_calc_interestOnly(calcIndex) {
    if(!calcIndex || calcIndex==undefined || calcIndex=='') calcIndex = 1;

    var principal = getNumberOnly(getFieldValue('interestonly', 'principal', calcIndex));
    var interestRate = getNumberOnly(getFieldValue('interestonly', 'interestrate', calcIndex)) / 100;

    interestRate /= 12;
    writeOutputData('interestonly', 'interestpayment', calcIndex, formatNumber(principal * interestRate));
}

function getFieldValue(formtype, fieldname, calcIndex) {
    var elemId = formtype + '-' + fieldname + '-' + calcIndex;
    var elem = document.getElementById(elemId);
    return elem.value;
}

function writeOutputData(formtype, fieldname, calcIndex, data) {
    var elemId = formtype + '-outputdata-' + fieldname + '-' + calcIndex;
    var elem = document.getElementById(elemId);
    elem.innerHTML = data;
    return true;
}

function getNumberOnly(num) {
    orgnum = parseFloat(num);
    num = '' + num;
    if(num.indexOf("%")>-1) return Number(orgnum) / 100;
    if(num.indexOf("/")>-1) return eval(num);

    var newnum = '';
    var numLength = num.length;
    for(var i=0; i<numLength; i++) {
        if(num[i] in numvalids) newnum += num[i];
    }
    var number = Number(newnum)
    return number;
}


function formatNumber(num, prepend, append) {
    if(!prepend || prepend==undefined)    prepend = '';
    if(!append || append==undefined)    append = '';
    if(!num || num==undefined || isNaN(num))    num = 0;

    if(num < 0) {
        num *= -1;
        prepend = "-" + prepend;
    }

    onum = Math.round(num * 100) / 100;
    integer = Math.floor(onum);

    if(Math.ceil(onum) == integer) {
        decimal = "00";
    } else {
        decimal = Math.round((onum - integer) * 100);
    }

    decimal = decimal.toString();
    if(decimal.length < 2) {
        decimal = "0" + decimal;
    }

    integer = integer.toString();
    if(integer=="Infinity" || integer.indexOf("nfi")>-1) integer = "0";
    var tmpnum = "";
    var tmpinteger = "";
    var y = 0;

    for(x = integer.length; x > 0; x--) {
        tmpnum = tmpnum + integer.charAt(x - 1);
        y++;
        if(y == 3 && x > 1) {
            tmpnum = tmpnum + ",";
            y = 0;
        }
    }

    for(x = tmpnum.length; x > 0; x--) {
        tmpinteger = tmpinteger + tmpnum.charAt(x - 1);
    }

    finNum = tmpinteger + "." + decimal;
    finNum = prepend + finNum + append;
    return finNum;
}