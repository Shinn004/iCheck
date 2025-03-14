<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examinee Results</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="mycss.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    
</head>
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
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header text-center">
                <h3>Examinee Results</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-primary">
                            <tr>
                                <th>Fullname</th>
                                <th>Exam Name</th>
                                <th>Scores</th>
                                <th>Ratings</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $selExmne = $conn->query("SELECT * FROM examinee_tbl et INNER JOIN exam_attempt ea ON et.exmne_id = ea.exmne_id ORDER BY ea.examat_id DESC ");
                                if($selExmne->rowCount() > 0) {
                                    while ($selExmneRow = $selExmne->fetch(PDO::FETCH_ASSOC)) { ?>
                                        <tr>
                                           <td><?php echo $selExmneRow['exmne_fullname']; ?></td>
                                           <td>
                                             <?php 
                                                $eid = $selExmneRow['exmne_id'];
                                                $selExName = $conn->query("SELECT * FROM exam_tbl et INNER JOIN exam_attempt ea ON et.ex_id=ea.exam_id WHERE ea.exmne_id='$eid' ")->fetch(PDO::FETCH_ASSOC);
                                                $exam_id = $selExName['ex_id'];
                                                echo $selExName['ex_title'];
                                              ?>
                                           </td>
                                           <td>
                                                <?php 
                                                    $selScore = $conn->query("SELECT * FROM exam_question_tbl eqt INNER JOIN exam_answers ea ON eqt.eqt_id = ea.quest_id AND eqt.exam_answer = ea.exans_answer  WHERE ea.axmne_id='$eid' AND ea.exam_id='$exam_id' AND ea.exans_status='new' ");
                                                ?>
                                                <span class="badge bg-success">
                                                    <?php echo $selScore->rowCount(); ?> / <?php echo $selExName['ex_questlimit_display']; ?>
                                                </span>
                                           </td>
                                           <td>
                                                <span class="badge bg-info">
                                                    <?php 
                                                        $score = $selScore->rowCount();
                                                        $over  = $selExName['ex_questlimit_display'];
                                                        $ans = $score / $over * 100;
                                                        echo round($ans, 2) . "%";
                                                    ?>
                                                </span>
                                           </td>
                                           <td>
                                               <a href="facebox_modal/updateExaminee.php?id=<?php echo $selExmneRow['exmne_id']; ?>" class="btn btn-sm btn-primary">Print Result</a>
                                           </td>
                                        </tr>
                                    <?php }
                                } else { ?>
                                    <tr>
                                        <td colspan="5" class="text-center text-danger">No Examinee Found</td>
                                    </tr>
                                <?php }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
