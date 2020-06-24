function valid(){

    // Get value
    userName = document.getElementsByName("username")[0].value;
    password = document.getElementsByName("password")[0].value;


    //check variaties
    var rep=document.getElementsByClassName("report");
    var errors = [];
    var nameSplit = userName.split('');
    var check =0;
    var flag=0; //flag to detect ' ' in username

    //main
    for(var i=0;i<nameSplit.length;i++)
    {
        if(nameSplit[i].localeCompare(' ')==0)
        {
            flag = 1;
        }
    }
    if(userName == "" || password == "")
    {      
        errors.push(" You must fill in all text boxes." +'<br/>');
        check++;
    }
    if(flag == 1)
    {
        errors.push(" There can't be space between characters in username." +'<br/>');
        check++;
    }
    if(check==0)
    {
        window.location.replace("index.html");
    }

    //Fix the output array
    var arrayJoin = fix(errors);

    // PRINT ARRAY
        rep[0].innerHTML = arrayJoin;
   
}
function fix(a)
{
    var contain="";
    for(var i=0;i<a.length;i++)
    {
        contain+=a[i];
    }
    return contain;
}
