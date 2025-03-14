 <?php 
    $examId = $_GET['id'];
    $selExam = $conn->query("SELECT * FROM exam_tbl WHERE ex_id='$examId' ")->fetch(PDO::FETCH_ASSOC);

 ?>
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
    <div id="refreshData">
            
    <div class="col-md-12">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div>
                        <?php echo $selExam['ex_title']; ?>
                          <div class="page-title-subheading">
                            <?php echo $selExam['ex_description']; ?>
                          </div>

                    </div>
                </div>
            </div>
        </div>  
        <div class="row col-md-12">
        	<h1 class="text-primary">RESULT'S</h1>
        </div>

        <div class="row col-md-6 float-left">
        	<div class="main-card mb-3 card">
                <div class="card-body">
                	<h5 class="card-title">Your Answer's</h5>
        			<table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                    <?php 
                    	$selQuest = $conn->query("SELECT * FROM exam_question_tbl eqt INNER JOIN exam_answers ea ON eqt.eqt_id = ea.quest_id WHERE eqt.exam_id='$examId' AND ea.axmne_id='$exmneId' AND ea.exans_status='new' ");
                    	$i = 1;
                    	while ($selQuestRow = $selQuest->fetch(PDO::FETCH_ASSOC)) { ?>
                    		<tr>
                    			<td>
                    				<b><p><?php echo $i++; ?> .) <?php echo $selQuestRow['exam_question']; ?></p></b>
                    				<label class="pl-4 text-success">
                    					Answer : 
                    					<?php 
                    						if($selQuestRow['exam_answer'] != $selQuestRow['exans_answer'])
                    						{ ?>
                    							<span style="color:red"><?php echo $selQuestRow['exans_answer']; ?></span>
                    						<?PHP }
                    						else
                    						{ ?>
                    							<span class="text-success"><?php echo $selQuestRow['exans_answer']; ?></span>
                    						<?php }
                    					 ?>
                    				</label>
                    			</td>
                    		</tr>
                    	<?php }
                     ?>
	                 </table>
                </div>
            </div>
        </div>

        <div class="col-md-6 float-left">
        	<div class="col-md-6 float-left">
        	<div class="card mb-3 widget-content bg-night-fade">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading"><h5>Score</h5></div>
                        <div class="widget-subheading" style="color: transparent;">/</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white">
                            <?php 
                                $selScore = $conn->query("SELECT * FROM exam_question_tbl eqt INNER JOIN exam_answers ea ON eqt.eqt_id = ea.quest_id AND eqt.exam_answer = ea.exans_answer  WHERE ea.axmne_id='$exmneId' AND ea.exam_id='$examId' AND ea.exans_status='new' ");
                            ?>
                            <span>
                                <?php echo $selScore->rowCount(); ?>
                                <?php 
                                    $over  = $selExam['ex_questlimit_display'];
                                 ?>
                            </span> / <?php echo $over; ?>
                        </div>
                    </div>
                </div>
            </div>
        	</div>

            <div class="col-md-6 float-left">
            <div class="card mb-3 widget-content bg-happy-green">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading"><h5>Percentage</h5></div>
                        <div class="widget-subheading" style="color: transparent;">/</div>
                        </div>
                        <div class="widget-content-right">
                        <div class="widget-numbers text-white">
                            <?php 
                                $selScore = $conn->query("SELECT * FROM exam_question_tbl eqt INNER JOIN exam_answers ea ON eqt.eqt_id = ea.quest_id AND eqt.exam_answer = ea.exans_answer  WHERE ea.axmne_id='$exmneId' AND ea.exam_id='$examId' AND ea.exans_status='new' ");
                            ?>
                            <span>
                                <?php 
                                    $score = $selScore->rowCount();
                                    $ans = $score / $over * 100;
                                    echo "$ans";
                                    echo "%";
                                    
                                 ?>
                            </span> 
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>


    </div>
</div>
