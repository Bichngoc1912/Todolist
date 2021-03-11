
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
    <link rel="stylesheet" type="text/css" href="../asset/css/style.css"/>
</head>
<body > 
    <header>
        
    </header>
 
    <div class="flex-menu">
        <div class="menu-item">
            <p>
                <a href="#" class="menu-item--link">Trang chủ</a> 
            </p>
        </div>
        <div class="menu-item">
            <p>
                <a href="#" class="menu-item--link">Danh mục</a> 
            </p>
        </div>
        <div class="menu-item">
            <p>
                <a href="#" class="menu-item--link">Tin tức</a> 
            </p>
        </div>
        <div class="menu-item">
            <p>
                <a href="#" class="menu-item--link">Giới thiệu</a>
            </p>
        </div>
    </div>
    <div class="container-fuild">
        <div id="Title">
            <h1>To do list</h1>
        </div>
        <div class="container">
            <div class="nav">
                <div class="nav-box">
                    <div class="nav-box--title"><span>Danh muc </span> </div>
                    <div class="content">All</div>
                </div>
                <div class="nav-box">
                    <div class="nav-box--title">bai bao</div>
                </div>
            </div>
            <div class="content">
                <form method="POST" class="input-txt" id="formSubmit" >
                    <input id="addItem" type="text" placeholder="Add Item">
                    <button  class="btn-submit" type="button" onclick="addItem1()" >+Add</button>
                </form>
                <div class="list-item" id="item">
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div>
            <span>To do list make by : Nguyen Thi Bich Ngoc</span> </br>
            <span>&copy; Copyright 2021</span>
        </div>
    </footer>
</body>
<script src="../asset/js/btnHandle.js"></script>
</html>