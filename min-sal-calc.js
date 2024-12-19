
const inputSalary = document.getElementById("gross_annual");
const inputExpense = document.getElementById("monthly_expense");
const inputTax = document.getElementById("estimated_taxes");

function isNumber(meinVal){
    //checks if it's a number
    return !isNaN(parseFloat(meinVal)) && isFinite(meinVal);
}

function isValid(meinValue){
    //returns true if valid
    if(meinValue != "" && isNumber(meinValue) == true){
        return true;
    } else {
        return false;
    }
}

document.getElementById("submit_button").addEventListener("click", function(){
    var answer;
    if(isValid(inputSalary.value) && isValid(inputExpense.value) && isValid(inputTax.value)){
        
        //subtract the percentage entered, then multiply by .01
        var taxMath = (100 - inputTax.value) * .01;
        //multiply the taxMath result with the gross annual salary
        var netAnnual = inputSalary.value * taxMath;
        //divide the net annual salary by 12
        var monthlyNet = netAnnual / 12;
        //if the net monthly amount is bigger than the monthly expense total 
        //then it will not be enough
        let usDollar = new Intl.NumberFormat('en-US', { style: 'currency', currency: 'USD'});
        formattedMonthlyNet = usDollar.format(monthlyNet);
        formattedInputExpense = usDollar.format(inputExpense.value);

        answer = (formattedMonthlyNet > formattedInputExpense) ? "YES!" : "NO.";
        numberAnswer = formattedMonthlyNet - formattedInputExpense;
        theMath = document.getElementById("annual_div_twelve");

        theMath.innerHTML = 'If (Net Annual Salary divided by 12) is ' + formattedMonthlyNet + ' and (Monthly Expense Total) is ' + formattedInputExpense + ', then the answer is:';

        mExNetAnnual = inputExpense.value * 12;
        taxToAdd = mExNetAnnual * taxMath;
        neededTotal = mExNetAnnual + taxToAdd;
        
        formattedNeed = usDollar.format(neededTotal);

        theResult = document.getElementById("result");
        //return the answer here
        theResult.innerHTML = answer;

        if(answer == "NO."){
            theNeed = document.getElementById("need");
            theNeed.innerHTML = 'You would need ' + formattedNeed;    
        } else {
            theNeed.innerHTML = "";
        }
    } else {
        alert("Only numbers, please.");
    }
});

document.getElementById("clear_button").addEventListener("click", function(){
    //clear all input boxes
    inputSalary.value = "";
    inputExpense.value = "";
    inputTax.value = "";
    theNeed = document.getElementById("need");
    theNeed.innerHTML = "";
    theResult = document.getElementById("result");
    theResult.innerHTML = "";
    theMath = document.getElementById("annual_div_twelve");
    theMath.innerHTML = "";
});