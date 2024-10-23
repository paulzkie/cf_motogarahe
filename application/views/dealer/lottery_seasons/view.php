<style>
    .img-thumbnail {
        height: 300px;
        transition: .2s;
        margin-right:20px;
    }   
    .img-thumbnail:hover {
        transform: scale(1.05, 1.05);
    }   
</style>
<div class="row">
    <div class="col-md-8">
    <?php foreach($lottery_prizes as $lottery_prize): ?>
        <a href="<?php echo base_url('admin/lottery_seasons/draw/' . $lottery_prize['lop_id'] . '/' . $lottery_prize['los_id'])?>">
            <img src="<?php echo $lottery_prize['lop_img']?>" alt="..." class="img img-responsive img-thumbnail">
        </a>
    <?php endforeach; ?>  
    </div>
</div>