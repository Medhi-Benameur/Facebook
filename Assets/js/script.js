// add Required to the imput

inputArray  = document.getElementsByTagName("input");
for (let i = 0; i < inputArray.length; i++)
{
    inputArray[i].required = true;
}


// add month on selector
let aujd = new Date();
let Days = [31,28,31,30,31,30,31,31,30,31,30,31];
let Month = ["janvier", "fevrier", "mars", "avril", "mai", "juin", "juillet", "aout", "septempbre",
            "octobre", "novembre", "decembre" ];

let monthElement = document.getElementById('month');
let dayElement   = document.getElementById('day');
let yearElement  = document.getElementById('year');
let option;

option = '<option value="day">Jour</option>';
for (let i=1;i <= Days[0];i++){ 
        option += '<option value="'+ i + '">' + i + '</option>';
    }
dayElement.innerHTML += option;

option = '<option value="month">Mois</option>';
for (let i=0;i != Month.length;i++){ 
    option += '<option value="'+ i + '">' + Month[i] + '</option>';
}
monthElement.innerHTML += option;

option = '<option value="year">Années</option>';
for (let i=aujd.getFullYear(); i != 1980  ;i--){ 
    option += '<option value="'+ i + '">' + i + '</option>';
}
yearElement.innerHTML += option;



