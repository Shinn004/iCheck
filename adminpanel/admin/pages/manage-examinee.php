<style>
body {
    background: linear-gradient(to right, #d4eaff, #f3e7ff);
    font-family: 'Inter', sans-serif;
    color: #333;
    margin: 0;
    padding: 0;
    animation: fadeIn 0.8s ease-in-out;
}

/* Hiệu ứng mở trang */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(-10px); }
    to { opacity: 1; transform: translateY(0); }
}

.card {
    background: rgba(255, 255, 255, 0.95);
    border-radius: 15px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    animation: slideUp 0.6s ease-in-out;
    padding: 20px;
    transition: transform 0.3s ease-in-out;
}

@keyframes slideUp {
    from { transform: translateY(20px); opacity: 0; }
    to { transform: translateY(0); opacity: 1; }
}

.card:hover {
    transform: scale(1.02);
}

/* Header */
.card-header {
    background: linear-gradient(to right, #7bc6ff, #b39cff);
    color: white;
    font-size: 1.5rem;
    font-weight: bold;
    text-align: center;
    border-top-left-radius: 15px;
    border-top-right-radius: 15px;
    padding: 12px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
}

/* Bảng câu hỏi */
.table {
    border-radius: 10px;
    overflow: hidden;
    width: 100%;
    background: rgba(255, 255, 255, 0.9);
}

.table th {
    background: linear-gradient(to right, #b39cff, #7bc6ff) !important;
    color: #fff;
    padding: 14px;
    text-align: center;
    font-size: 1.1rem;
}

.table td {
    padding: 14px;
    text-align: center;
    color: #333;
    font-weight: 500;
    transition: background 0.3s ease-in-out;
}

.table-hover tbody tr:hover {
    background: rgba(255, 255, 255, 0.6);
    transform: scale(1.02);
    transition: all 0.3s ease-in-out;
}

/* Nút bấm */
.btn-primary {
    background: linear-gradient(to right, #7bc6ff, #b39cff);
    border: none;
    transition: all 0.3s ease-in-out;
    padding: 12px 16px;
    border-radius: 10px;
    font-size: 1rem;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    cursor: pointer;
    font-weight: 600;
}

/* Hiệu ứng nút bấm nhún */
.btn-primary:active {
    transform: scale(0.95);
}

.btn-primary:hover {
    background: linear-gradient(to right, #b39cff, #7bc6ff);
    transform: scale(1.05);
}

/* Header chính */
.dashboard-header {
    font-size: 2rem;
    font-weight: bold;
    color: #4b4b4b;
    text-align: center;
    margin-bottom: 20px;
    text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.2);
}

/* Hiệu ứng khi chuyển trang */
@keyframes fadeInScale {
    from { opacity: 0; transform: scale(0.95); }
    to { opacity: 1; transform: scale(1); }
}

.content {
    animation: fadeInScale 0.6s ease-in-out;
}
</style>
<div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div>MANAGE EXAMINEE</div>
                    </div>
                </div>
            </div>        
            
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">Examinee List
                    </div>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                            <thead>
                            <tr>
                                <th>Fullname</th>
                                <th>Gender</th>
                                <th>Birthdate</th>
                                <th>Course</th>
                                <th>Year level</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>status</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                              <?php 
                                $selExmne = $conn->query("SELECT * FROM examinee_tbl ORDER BY exmne_id DESC ");
                                if($selExmne->rowCount() > 0)
                                {
                                    while ($selExmneRow = $selExmne->fetch(PDO::FETCH_ASSOC)) { ?>
                                        <tr>
                                           <td><?php echo $selExmneRow['exmne_fullname']; ?></td>
                                           <td><?php echo $selExmneRow['exmne_gender']; ?></td>
                                           <td><?php echo $selExmneRow['exmne_birthdate']; ?></td>
                                           <td>
                                            <?php 
                                                 $exmneCourse = $selExmneRow['exmne_course'];
                                                 $selCourse = $conn->query("SELECT * FROM course_tbl WHERE cou_id='$exmneCourse' ")->fetch(PDO::FETCH_ASSOC);
                                                 echo $selCourse['cou_name'];
                                             ?>
                                            </td>
                                           <td><?php echo $selExmneRow['exmne_year_level']; ?></td>
                                           <td><?php echo $selExmneRow['exmne_email']; ?></td>
                                           <td><?php echo $selExmneRow['exmne_password']; ?></td>
                                           <td><?php echo $selExmneRow['exmne_status']; ?></td>
                                           <td>
                                               <a rel="facebox" href="facebox_modal/updateExaminee.php?id=<?php echo $selExmneRow['exmne_id']; ?>" class="btn btn-sm btn-primary">Update</a>

                                           </td>
                                        </tr>
                                    <?php }
                                }
                                else
                                { ?>
                                    <tr>
                                      <td colspan="2">
                                        <h3 class="p-3">No Course Found</h3>
                                      </td>
                                    </tr>
                                <?php }
                               ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
      
        
</div>
         
