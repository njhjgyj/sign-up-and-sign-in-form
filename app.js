function foo1() {
    let getFName = document.getElementById('fnameid1').value;
    let getLName = document.getElementById('lnameid1').value;
    let getPass = document.getElementById('passid1').value;
    let getConPass = document.getElementById('conpassid1').value;

    if (getFName.length < 3) {
        document.getElementById('fnameerror').innerHTML = "first name is too short must be atleast 3 chracters";
        return false;
    } else {
        document.getElementById('fnameerror').innerHTML = "";
    };

    if (getLName.length < 3) {
        document.getElementById('lnameerror').innerHTML = "last name is too short must be atleast 3 chracters";
        return false;
    } else {
        document.getElementById('lnameerror').innerHTML = "";
    };

    if (getPass.length < 10) {
        document.getElementById('passerror').innerHTML = "password is too short must be atleast 10 chracters";
        return false;
    } else {
        document.getElementById('passerror').innerHTML = "";
    };

    if (getConPass != getPass) {
        document.getElementById('conpasserror').innerHTML = 'Your Confirm password is not match to the password';
        return false;
    } else {
        document.getElementById('conpasserror').innerHTML = '';
    }

    return true;



}


function foo2() {
    document.getElementById('passid1').setAttribute('type', 'text');
    document.getElementById('showpass1').style.display = 'none';
    document.getElementById('hidepass1').style.display = 'block';
};

function foo3() {
    document.getElementById('passid1').setAttribute('type', 'password');
    document.getElementById('hidepass1').style.display = 'none';
    document.getElementById('showpass1').style.display = 'block';
};

function foo4() {
    document.getElementById('conpassid1').setAttribute('type', 'text');
    document.getElementById('showpass2').style.display = 'none';
    document.getElementById('hidepass2').style.display = 'block';
};

function foo5() {
    document.getElementById('conpassid1').setAttribute('type', 'password');
    document.getElementById('hidepass2').style.display = 'none';
    document.getElementById('showpass2').style.display = 'block';
};