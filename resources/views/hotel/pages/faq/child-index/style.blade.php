<style>
  .accordion{
width: 100%;
height: 60px;
margin: 0 auto;
background: #fff;
border-radius: 3px;
box-shadow: 0 0 5px rgba(225,225,225,1);
overflow: hidden;
transition: height 0.3s ease;
margin-bottom: 20px;
}
.wrapper {
  margin-top: 35px;
}
.accordion .accordion_tab{
padding: 20px;
cursor: pointer;
user-select: none;
font-size: 18px;
font-weight: 700;
text-transform: uppercase;
letter-spacing: 2px;
position: relative;
}

.accordion .accordion_tab .accordion_arrow{
position: absolute;
top: 25%;
transform: translateY(-50%);
right: 20px;
width: 15px;
height: 15px;
transition: all 0.3s ease;
}

.accordion .accordion_tab .accordion_arrow img{
width: 100%;
height: 100%;
}


.accordion.active{
height: auto;
}

.accordion .accordion_content{
padding: 20px;
border-top: 1px solid #e9e9e9;
}

.accordion .accordion_content .accordion_item{
margin-bottom: 20px;
}

.accordion .accordion_content .accordion_item p.item_title{
font-weight: 600;
margin-bottom: 10px;
font-size: 18px;
color: #6adda2;
}

.accordion .accordion_content .accordion_item p:last-child{
color: #9a9b9f;
font-size: 14px;
line-height: 20px;
}
</style>