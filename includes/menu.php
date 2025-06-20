<div class="menu">
   <div class="profile">
    <!-- <div class="profileicon">
        <p>df</p>
    </div> -->
    <div class="hamburger" onclick='toggleMenu()'>
        <div class="line"></div>
         <div class="line"></div>
          <div class="line"></div>
    </div>
   </div>
   <div class="menu-list">
    <ul>
     <li><span><a href="index.php"><img src="./assets/home.svg" alt=""></a></span><a href="/simpleCrud/index.php">Home</a></li>
    <li><span><a href="students.php"><img src="./assets/students.svg" alt=""></a></span>
    <!-- dropdown -->
     <div class="dropdown">
         <a href="#" class="dropdown-toggle">Students <span class="arrow"></span></a>
         <div class="dropdown-menu">
            <a href="./students_add.php">Add Students</a>
            <a href="./students.php">View Students</a>
         </div>
     </div>
   </li>
    
       <li><span><a href="logout.php"><img src="./assets/logout.svg" alt=""></a></span><a href=" /simpleCrud/logout.php">Log out</a></li>
        </ul>
   </div>
</div>
<script src="./js/app.js"></script>