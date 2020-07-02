/* bỏ gạch chân link */
a
{
    text-decoration: none;
}

/* hình ảnh sản phẩm bên trái */
table tr,td
{
    border:none;
}
.p_table tr td
{
    border: 1px solid black;
    border-collapse: collapse;
}
.td-product-left
{
    border: none;
    width: 50%; 
}

.td-product-left #mainImg 
{
    width: 450px;
    height: 400px;
}

/* bỏ border */

.td-product-right
{
    width:100%;
}
.td-product-right tr, td
{
    border: none;
}



/* ảnh sản phẩm bên trái */
.td-product-slide-left
{
    display: flex;
    justify-content: space-between;
    flex-direction: column;
    justify-content: center;
    width: 100%;
    border: none;
}

.gallery-img
{
    width: 50px;
    cursor: pointer;
    margin: 5px 0;
    margin-left: -100px;
    vertical-align: middle;
    border: 1px solid #DDDDDD;
}


.product-name
{
    color: #000;
    font-size: 28px;
    font-weight: bold;
}



.product-price-value
{
    color: red;
    font-weight: bolder;
}


.product-price
{
    border: none;
    font-size: 30px;
    
}
/* .price 
{
    
    width: 160px;
    height: 30px;
    font: 20px bold;
    color: red;
    padding-top: 5px;
    padding-right: 1px;
    padding-left: 5px;
}
.shipping-icon img
{
   
    width: 32px;
    height: 20px;
    padding-left:5px;
    padding-top: -30px;
}
.discount
{
    font: 10px;
    font-style: italic;
    color: black;
    padding-top: 0px;
    padding-right: 1px;
    padding-left: 5px;
}


.quality-box
{
    height: 40px;
    width: 40px;
    text-align:center;
    padding-top: 5px;
    padding-right: 1px;
    padding-left: 5px;
}

.quality span
{
    font: 30px;
    margin-left: 40px;
}

.button-buy a
{
    float:left;
   
    width: 65px;
    height: 20px;
    font: 12 px bold;
    color:rgb(218, 4, 238);
    margin-top: -12px;
    margin-bottom: 12px;
    padding-left: 10px;
    padding-bottom: 1px;
    margin-right: 1px;
    text-align: left;
} */


/* Mô tả sản phẩm */
 .describe-product
{
    display: inline-block;
    width: 300px;
    height: 300px;
    border: 1px solid #DDDDDD;
    clear: both;
    font-size: 15px;
    font-style: italic;
    line-height: 15px;
    margin-top: 5px;
    margin-left: 5px;
}
.describe-product span p
{
    padding-left: 10px;
    font-weight: bold;
    color: burlywood;
    font-size: 20px;
} 


/* Thương hiệu, đánh giá, sản phẩm */
.brand-rv-cmt
{
    display: inline-block;
    border: 1px solid #DDDDDD;
    position: absolute;
    margin-top: 5px;
    margin-left: 5px;
    
}
.brand-rv-cmt p
{
    width: 680px;
    height: 235px;
    float: left;
    font: 12px;
    font-style: italic;
}
.brand-rv-cmt a
{
    color: burlywood;
}

.brand-rv-cmt ul{
    font-size: 20px;
    font-weight: bold;
    list-style-type: none;
    margin: 0;
    padding: 0;
    
}
.brand-rv-cmt li{
    display: inline-block;
    padding: 5px;
    color: burlywood;
}

.brand-rv-cmt a:hover
{
    text-decoration: none;
    background-color: #33FF66;
    color:#DDDDDD;
}

.similar-product ul
{
    /* border: 1px solid black; */
    margin: 0 auto;
    text-align: center;
    font-size: 30px;
    font-weight: bold;
    list-style-type: none;
    margin: 0;
    padding: 0;
    
}

.similar-product li{
    display: inline-block;
    padding: 5px;
}

.similar-product li a
{
    color: burlywood;
}
.similar-product a
{
    color: #000;
}
/* .similar-product a:hover
{
    border: 1px solid #999999;
    border-width: 50px;
    text-decoration: none;
   
} */

.similar-product img
{
    weight: 150px;
    height: 100px;
}

.similar-product-box
{
    width: 191px;
    margin: 2px 1px 10px 0px;
    text-align: center;
    /* border: 2px  #000; */
    display: inline-block;
    min-height: 50px;
}


/* sản phẩm chi tiết */


.table-product-detail table
{
    width: 100%;
    max-width: 100%;
    margin-bottom: 20px;
    background-color: transparent;
    border-spacing: 0;
    border-collapse: collapse;
    
}

.table-product-detail thead {
    display: table-header-group;
    vertical-align: middle;
    border-color: inherit;
}

.table-product-detail thead tr {
    display: table-row;
    vertical-align: inherit;
    border-color: inherit;
}

.info-th
{
    font-style: italic;
    font-size: 40px;
    font-weight: bold;
    color: burlywood;
    border: 1px solid #DDDDDD;
    background: #E5E5E5;
}

.td-right
{
    vertical-align: top;
    border: 1px solid #DDDDDD;
}
.td-left
{
    vertical-align: top;
    border: 1px solid #DDDDDD;
}

.tb-in-td
{
    border: 1px solid #DDDDDD;
}
.td-right table
{
    
    border-spacing: 0;
    border-collapse: collapse;
    margin-bottom: 0;

}

/* box gợi ý */


.boxx {
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
    width: 140px;
    padding: 10px;
    margin: 15px;
    border: 1px solid #DDDDDD;
    text-align: center;
    
}
.boxx img{
    width: 150px;
    height: 100px;
}

.boxx:hover, .boxx:focus, .boxx:active {
    -webkit-transform: scale(1.1);
    transform: scale(1.1);
}
.boxx a
{
    text-decoration: none;
}
.boxx a:hover{
    text-decoration: none;
}

