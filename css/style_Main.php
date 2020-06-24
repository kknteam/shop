.container{
    margin: auto;
    width: 1000px;
    background-color: white;  
}
.clearfix:after{
    content: ".";
    visibility: hidden;
    display: block; 
    clear: both;
}
.header{
    clear: both;
}
/* NAVIGATE */
.nav{
    background-color: white;
    text-align: center;
    font-weight: bold;
    <!-- /* hidden will make div card extend whenever elemnt filled in */ -->
    overflow: hidden; 

}

.nav ul{
    list-style-type: none;
    margin: 0;
    padding: 0;
}
#lft{
   float:left;
    <!-- This will keep li element in one line  -->
}
.nav a{
    display: block;
    background-color: white;
    text-decoration: none;
    color: white;
    padding: 10px;
}
.nav a:hover{
    text-decoration: none;
    background-color: #DBD7D7;
    color: #2C33FB;
}
a.active{
    color:white;
    background-color: white;
}
#lft{
    display: block;
    float:left;
}
#lft a{
    border-right: 1px solid white;
}
#rgt{
    display: block;
    float: right;
}
#rgt a{
    border-left: 1px solid white;
}




/*SIDEBAR*/

.sidebar{
    width: 195px;
    margin: 0px;
    padding: 0px;
    background: #FFF;
    border-bottom: 2px solid #fff;
    float: left;
    margin-bottom: 10px;
    font-weight: bold;
}
.sidebar dl dt{
    background: white;
    color: white;
    margin: 2px 2px 1px 2px;
    padding: 6px 0px;
    text-align: center;
    font-weight: bold;
}
.sidebar dl{
    margin:0px;
    padding:0px;
}
.sidebar dl dd{
    background: white;
    border-bottom: 1px solid white;
    margin: 0px 2px;
    padding: 0px;
}
.sidebar dl dd a{
    color: white;
    font-weight: bold;
    padding: 3px 22px;
    display: block;
    text-decoration: none;
}
.sidebar dl dd a:hover{
    background: white;
}

.dropdown{
    position: relative;
    display:inline-block;
}
.dropdown button{
    font-size:20px;
    text-align: center;
    font-family: 'Times new roman';
    margin-left: 2px;
    width: 195px;
    border: 1px solid black;
    border-radius: 4px;
}
.dropdown-content{
    display:none;
    position:absolute;

    min-width: 130px;

    padding:5px;
    z-index:1;
}
.dropdown:hover .dropdown-content{
    display:block;
}

/* CONENT */
.content{
    float:right;
    margin-top: 5px;
    margin-left: 2px;
    width:796px;
    min-height: 50px;
}
.So_trang{
    float:right;
}
/* GROW CONTENT */
.box {
    display: inline-block;
    vertical-align: middle;
    -webkit-transform: perspective(1px) translateZ(0);
    transform: perspective(1px) translateZ(0);
    box-shadow: 0 0 1px rgba(0, 0, 0, 0);
    -webkit-transition-duration: 0.3s;
    transition-duration: 0.3s;
    -webkit-transition-property: transform;
    transition-property: transform;
    /* ADDED */
    width: 200px;
    padding: 10px;
    margin: 15px;
    border: 1px dotted black;
    text-align: center;
}
.box img{
    width: 150px;
    height: 100px;
}

.box:hover, .box:focus, .box:active {
    -webkit-transform: scale(1.1);
    transform: scale(1.1);
}
<!-- /* CONTENT - SELFMOD */ -->
.box a{
    text-decoration: none;
}
.box:hover{
    font-weight: bold;
    font-size: 15px;
}
.name{
    font-weight: bold;
    margin-top: 25px;
    margin-bottom: 2px;
    color: #FE4E4E;
}

<!-- /* Sweep To Left */ -->
.hvr-sweep-to-left {
    display: inline-block;
    vertical-align: middle;
    -webkit-transform: perspective(1px) translateZ(0);
    transform: perspective(1px) translateZ(0);
    box-shadow: 0 0 1px rgba(0, 0, 0, 0);
    position: relative;
    -webkit-transition-property: color;
    transition-property: color;
    -webkit-transition-duration: 0.3s;
    transition-duration: 0.3s;
      /* MOD */
    background: #ECEBEB;
    padding: 5px;
}
.hvr-sweep-to-left:before {
    content: "";
    position: absolute;
    z-index: -1;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: #FF9D00;
    -webkit-transform: scaleX(0);
    transform: scaleX(0);
    -webkit-transform-origin: 100% 50%;
    transform-origin: 100% 50%;
    -webkit-transition-property: transform;
    transition-property: transform;
    -webkit-transition-duration: 0.3s;
    transition-duration: 0.3s;
    -webkit-transition-timing-function: ease-out;
    transition-timing-function: ease-out;
}
.hvr-sweep-to-left button:hover, .hvr-sweep-to-left:focus, .hvr-sweep-to-left:active {
    text-decoration: none;
    color: white;
    font-weight: bold;

}
.hvr-sweep-to-left:hover:before, .hvr-sweep-to-left:focus:before, .hvr-sweep-to-left:active:before {
    -webkit-transform: scaleX(1);
    transform: scaleX(1);
}

.admin{
    text-align: center;
    font-weight: bold;
    /* hidden will make div card extend whenever elemnt filled in */
    overflow: hidden; 
    float: left;
    width: 100%;
    padding: 0;
    margin: 0;
}
.admin ul{
    list-style-type: none;
    margin: 0;
    padding: 0;
}
.admin a{
    display: block;
    text-decoration: none;
    color: black;
    padding: 10px;
    float: left;
}
.admin a:hover{
    background-color: #CAC7C7;
    text-decoration: none;
    transition: all 0.5s ease;
}
/*PRODUCT style*/
.p_table #headline{
    background-color: white; 
    color: white;
    text-align: center;
}
.p_table a
{
    text-decoration: none;
    color: blue;
}
.p_table a:hover
{
    text-decoration: none;
    color: red;
}

.p_table table{
    border-collapse: collapse;
    background-color: white;

}
.p_table input[type=number]{
    width: 100px;
}
.p_table input[type=submit]{
    text-align: center;
    width: 100px;
    padding: 5px;
    border: none;
    border-radius: 4px;
    background-color: #0C1C83;
    color: white;
}
.p_table input[type=submit]:hover{
    background-color: tomato;
    color: white;
}
.p_table table, tr, td{
    border: 1px solid grey;
    padding: 10px;
    margin: 10px;
}
/*Button style*/
.sub{
    padding: 10px;
    margin-top: 5px;
    background-color: tomato;
    color: white;
    border: none;
    border-radius: 4px;
}
.sub:hover{
    background-color: red;
    transition: all 0.5s ease;
}
/* FOOTER */
.footer{
    -webkit-box-sizing: inherit;
    overflow: hidden;
    box-sizing: inherit;
    clear: both;
    text-align: center;
    font-weight: bold;
    color:white;
}
.signin{
    text-align: right;
    background-color: #dad8d8;
    padding: 0;
    margin: 0;
}

.about{
    width: 365.6px;
    float: left;
}
.about #trai{
    width: 70px;
    height: 38px;
    margin-top: 15px;
    margin-right: 20px;
    float: left;
}
.about #phai{
    font-size: 15px;
    width: 245px;
    color: #6C6666;
    float: left;
}
.contact{
    width: 300px;
    float: left;
}
.contact p{
    font-size: 16px;
    margin-top: 10px;
    font-weight: italic;
    color: white;
}
.contact span{
    font-size: 20px;
    font-weight: bold;
}
/*contact*/
.contact1{
    /*clear: both;*/
    background-color: #FFF;
    text-align: center;
    font-weight: bold;
    width: 1000px;
}


.detail1{
    width: 300px;
    float: left;

}
.detail2{
    width: 400px;  
    float:left;
}

.detail3{
    width: 300px;
    float: left;
}
.contain-detail{
    overflow: hidden;
    width: auto;
    padding-left: 75px;
    text-align: center;
}
.link{
    width: 300px;
    float: left;
}
.link p{
    font-size: 16px;
    margin-top: 45px;
    color: #6C6666;
}
/*about*/
.about1{
    float:right;
    margin-top: 5px;
    margin-left: 2px;
    width:796px;
    min-height: 50px;
}

#about1a{
    padding: 10px 10px 10px 10px;
    min-height:220px;
}

#about1aleft{
    float:left;
    margin-bottom:10px;
}



/*contact*/
.contact1{
    margin-top: 5px;
    margin-left: 2px;
    width:100%;
    min-height: 50px;
    color: #FF0000;
}
.contain-contact{
    overflow: hidden;
    width: 100%;
    margin: auto;
}

/* SIDEBAR - INPUT */
.giaTien
{
   display: inline-block;
   width: 260px;
}
.giaTien #content
{
    display: block;
    height: 40px;
    text-align: center;
    line-height: 40px;
}
.giaTien form input[type="number"]
{
  width: 100px;
}
.giaTien  button
{
    margin-top: -10px;
     width: 30px;
     background-color: #F89406;
     color: white;
     border: none;
     border-radius: 4px;
}
.giaTien  button:hover
{
     background-color: red;
     color: white;
     transiion: all 0.5s ease;
}
.subMenu li:hover
{
    color: #FF6347;
}
.subMenu li{
    text-align: left;
    background-color: #F7F7F7;
    display: block;

}
.user_menu
{
    width: 200px;
    float: left;
    margin-right: 0px;
    margin-top: 0px;
    background-color: #F5F5F5;
}
.user_menu button{
    padding:5px;
    margin-bottom: 5px;
    background-color: #F89406;
    color: white;
    width: 190px;
    border-right: 5px solid red;
    border-radius: 5px;
    text-align: left;
}
.hvr-box-shadow-inset {
  display: inline-block;
  vertical-align: middle;
  -webkit-transform: perspective(1px) translateZ(0);
  transform: perspective(1px) translateZ(0);
  box-shadow: 0 0 1px rgba(0, 0, 0, 0);
  -webkit-transition-duration: 0.3s;
  transition-duration: 0.3s;
  -webkit-transition-property: box-shadow;
  transition-property: box-shadow;
  box-shadow: inset 0 0 0 rgba(0, 0, 0, 0.6), 0 0 1px rgba(0, 0, 0, 0);
  /* Hack to improve aliasing on mobile/tablet devices */
}
.hvr-box-shadow-inset:hover, .hvr-box-shadow-inset:focus, .hvr-box-shadow-inset:active {
  box-shadow: inset 2px 2px 2px rgba(0, 0, 0, 0.6), 0 0 1px rgba(0, 0, 0, 0);
  /* Hack to improve aliasing on mobile/tablet devices */
}
.user_info
{
    background-color: #F5F5F5;
    float: left;
}
.user_info h1
{  
    padding: 5px;
    margin: 0;
    background-color: #F89406;
    color: white;
}