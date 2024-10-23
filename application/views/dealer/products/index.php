<div class="row">
    <div class="col-md-3 col-filter">
        <a href="<?php echo $create?>" class="btn btn-primary btn-block btn-flat margin-bottom">
        <i class="fa fa-plus-circle" aria-hidden="true"></i> Create
        </a>    
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Filter</h3>
            </div>
            <div class="box-body no-padding">
                <ul class="nav nav-pills nav-stacked">
                    <li>
                        <a href="<?php echo $all?>"><i class="fa fa-circle-o"></i> All</a>
                    </li>
                    <li>
                        <a href="<?php echo $published?>"><i class="fa fa-circle-o text-blue"></i> Published </a>
                    </li>
                    <li>
                        <a href="<?php echo $draft?>"><i class="fa fa-circle-o text-yellow"></i> Draft </a>
                    </li>
                    <li>
                        <a href="<?php echo $deleted?>"><i class="fa fa-circle-o text-red"></i> Delete</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Manage Products</h3>
                <div class="box-tools">
                <form method="POST" class="form-inline">
                    <div class="form-group"> 
                        <select class="form-control input-sm" name="search_type" style="width: 100px;">
                            <option value="pro_name">Name</option>
                            <option value="cat_name">Category</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="input-group input-group-sm" style="width: 200px;">
                            <input type="text" name="search_val" class="form-control pull-right" placeholder="Search">
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </form>    
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive mailbox-messages">
                    <table id="example1" class="table table-hover table-striped tablesorter">
                        <thead>
                            <tr>    
                                <th></th>
                                <th>Image</th>
                                <th>Product</th>
                                <th>Code</th>
                                <th>Price</th>
                                
                                <th>Category</th>
                                <th>Created</th>
                                <th>Tools</th>
                            </tr>
                        </thead>    
                        <tbody>
                        
                        <?php if ( isset( $products ) ):$x=1;?>
                            <?php foreach($products as $product): ?>
                                <tr>
                                    <!-- <td><input type="checkbox"></td> -->
                                    
                                    <td>
                                        <?php echo $x; $x++;?>   
                                    </td>
                                    <td>
                                        <img src="<?php echo base_url() .  $product['pro_image'] ?>" class="img-responsive" height="75">
                                    </td>
                                    <td><a href="<?php echo base_url() . 'admin/products/view/' . $product['pro_id']?>">
                                        <?php echo $product['pro_name'] ?>
                                    </a></td>
                                    <td><?php echo $product['pro_code']?></td>
                                    <td>₱ <?php echo number_format( $product['pro_price'], 2) ?></td>
                                    
                                    
                                    <td>
                                        <?php
                                            $label = '';

                                            if ( $product['pro_status'] == 'published' ) {
                                                $label = 'label-success';
                                            } elseif ( $product['pro_status'] == 'draft' ) {
                                                $label = 'label-warning';
                                            } elseif ( $product['pro_status'] == 'deleted' ) {
                                                $label = 'label-danger';
                                            }
                                        ?>
                                        <span class="label label-default"><?php echo $product['cat_name'] ?></span>
                                        <span class="label <?php echo $label;?>"><?php echo $product['pro_status'] ?></span>
                                    </td>
                                    <td><?php echo date("F j, Y, g:i a",strtotime($product['pro_created'])) ?></td>
                                    <td>    
                                        <div class="tools">
                                            <?php if ( $this->session->userdata('acc_id') == 1 ) :?>
                                            <a href="<?php echo base_url() . 'admin/products/edit/' . $product['pro_id']?>"><i class="fa fa-edit"></i></a>
                                            <a href="<?php echo base_url() . 'admin/products/delete/' . $product['pro_id']?>"><i class="fa fa-trash-o"></i></a>
                                            <?php endif;?>
                                        </div>
                                    </td>
                                </tr>

                            <?php endforeach;?>
                        <?php endif;?>
                        </tbody>
                    </table>   
                    <!-- /.table -->
                </div>

                <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->

        </div>
        <?php echo $this->pagination->create_links(); ?>
    </div>
</div>