<!DOCTYPE html>
<html lang="ja">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        勤務表
    </title>
    <?= $this->Html->css("User_table") ?>
    <!-- 戻るアイコンボタン -->
    <?php echo $this->Html->css("backButton"); ?>
    <!-- ヘッダー -->
    <?php echo $this->element('components/header'); ?>
</head>
<body>
    
    <div><button id="backButton"><i class="fas fa-arrow-circle-left fa-3x"></i></button></div>

    <div class="id_name">
        <h6>ID:<?= $me->employee_id ?></h6>
        <h6><?= $me->last_name.$me->first_name ?></h6>
    </div>
        <h1 class="title">勤務時間表</h1>
        <h2 class="oct"><?= (int) $data['month'] ?>月</h2>    
    <div class="month">
        <h3><a href="/works/<?php echo date('m/Y', mktime(0,0,0,$data['month']-1,1,2022)); ?>">前の月へ</a></h3>
        <h3><a href="/works/<?php echo date('m/Y', mktime(0,0,0,$data['month']+1,1,2022)); ?>">次の月へ</a></h3>
    </div>

    <div class="total">
        <table>
                <th>総労働時間</th>
                <td><?= $data['total'] ?>時間</td>
        </table>
        <table>
                <th>総残業時間</th>
                <td><?= $data['overtime'] ?>時間</td>
        </table>
        <table>
                <th>総勤務時間</th>
                <td><?= $data['work'] ?>時間</td>
        </table>
        <table>
                <th>出勤日数</th>
                <td><?= $data['workday'] ?>日</td>
        </table>
    </div>
    <table class="glaf">
        <thead>
            <tr>
                <td class="non"></td>
                <th class="fir_row"scope="col">出勤時間</th>
                <th class="fir_row"scope="col">退勤時間</th>
                <th class="fir_row"scope="col">休憩開始時間</th>
                <th class="fir_row"scope="col">休憩終了時間</th>
                <th class="fir_row"scope="col">労働時間</th>
                <th class="fir_row"scope="col">休憩時間</th>
                <th class="fir_row"scope="col">残業時間</th>
                <th class="fir_row"scope="col">総勤務時間</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['dates'] as $date): ?>
                <tr>
                    <th class="date"><?= $date['date'] ?>日</th>
                    <td data-label="出勤時間" class="time"><?= $date['start_work'] ?></td>
                    <td data-label="退勤時間" class="time"><?= $date['end_work'] ?></td>
                    <td data-label="休憩開始時間" class="time"><?= $date['start_break'] ?></td>
                    <td data-label="休憩終了時間" class="time"><?= $date['end_break'] ?></td>
                    <td data-label="労働時間" class="time"><?= $date['work'] ?></td>
                    <td data-label="休憩時間" class="time"><?= $date['break'] ?></td>
                    <td data-label="残業時間" class="time"><?= $date['overtime'] ?></td>
                    <td data-label="総労働時間" class="time"><?= $date['total'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>   

</body>



</html>