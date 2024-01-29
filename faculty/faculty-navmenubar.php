<nav class="sidebar background-shade">
    <div class="row">
        <div class="col-2" >
            <img src="../assets/images/logo.png" alt="SBCA logo" width="45px">
        </div>
        <div class="col-10">
            <h4 style="padding-left: 5px;">San Beda College Alabang</h4>
        </div>
    </div>

    <ul>
        <li class="sidebar-item">
            <a href="./index.php?page=dashboard">Dashboard</a>
        </li>
        <?php
        
        ?>
        <!-- <li class="sidebar-item">
            <a href="./index.php?page=classroom">Classroom Observation</a>
        </li>
        <li class="sidebar-item">
            <a href="./index.php?page=performance">Performance Appraisal</a>
        </li>
        <li class="sidebar-item">
            <a href="./index.php?page=feedback">Student Feedback</a>
        </li> -->
        <li class="sidebar-item">
            <a href="./index.php?page=certification">Certificates</a>
        </li>

        <?php
        $form = new Form;

        $formcount = $form->getFormID($_SESSION['user_id'], $_SESSION['role']);
        $formPage = formPage(getUsername());

        $displayedFormIds = array(); // Array to keep track of displayed form IDs

        while ($row = $formPage->fetch_assoc()) {
            $formId = $row['form_id'];

            // Check if the form_id has already been displayed
            if (!in_array($formId, $displayedFormIds)) {
                $formName = getFormName($formId);
                $formName = strtolower($formName);

                // Display the link and add the form_id to the displayed array
                ?>
                <li class="sidebar-item">
                    <a href="./index.php?page=result&fid=<?=$formId?>"><?=$formName?></a>
                </li>
                <?php

                $displayedFormIds[] = $formId;
            }
        }




        

        if (count($formcount) >= 1)  {
            ?>
            <li class="sidebar-item">
                <a href="../shared/forms/form.php">Forms</a>
            </li>
            <?php
        }
            ?>
        
    </ul>

    <div class="account-details d-flex flex-column justify-content-center align-items-center">
        <img class="user-profile my-2" src="../assets/images/user.jpg" 
            alt="user-profile" width="40px">
        <h6><?php echo getUsername(); ?></h6>
        <small class="user-role"><?php echo getRole(); ?></small>
        <form action="#" method="post" class="w-100">
            <button type="submit" name="btn-logout" class="rounded-pill py-1">Log out</button>
        </form>
    </div>

    <?php
    if(isset($_POST['btn-logout'])){
        logout();
    }
    ?>
</nav>