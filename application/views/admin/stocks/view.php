<div class="row">
    <div class="col-md-8">
        <div class="box box-primary">

                <div class="box-body">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?php echo $stocks_infos[0]['sto_from']?></h3>
                        <small class="pull-right"><?php echo date("F j, Y, g:i a",strtotime( $stocks_infos[0]['sto_created']))?></small>
                    </div>
                    <div class="table-responsive mailbox-messages">
                        <table id="example1" class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Category</th>
                                    <th>Unit</th>
                                    <th>Qty</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                            <?php if ( isset( $stocks_infos ) ):?>
                                <?php foreach($stocks_infos as $stock): ?>
                                    <tr>
                                        <td><a href="<?php echo base_url() . 'admin/products/view/' . $stock['pro_id']?>">
                                            <?php echo $stock['pro_name'] ?>
                                        </a></td>
                                        <td><?php echo $controller->get_category_name($stock['pro_id']) ?></td>
                                        <td><?php echo $stock['pro_unit'] ?></td>
                                        <td><?php echo $stock['sti_qty'] ?></td>
                                    </tr>
                                <?php endforeach;?>
                            <?php endif;?>
                            </tbody>
                        </table>   
                        <!-- /.table -->
                    </div>

                </div>
                
                <div class="box-footer">
                    <a href="<?php echo $back ?>" class="btn btn-default btn-flat">
                    <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back
                    </a>
                    <a href="<?php echo $edit ?>" class="btn btn-primary btn-flat pull-right">
                    <i class="fa fa-edit" aria-hidden="true"></i> Edit
                    </a>
                </div>
            <!-- /.box-body -->
        </div>
    </div>
</div>