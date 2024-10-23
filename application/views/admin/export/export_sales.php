<?php $grand_total = 0;?>
                    <?php $grand_sub = 0;?>
                    <table id="example1" class="table table-hover table-striped tablesorter">
                        <thead>
                            <tr>
         
                                <th>CLIENT</th>
                                <th>BRANCH</th>
                                <th>PRODUCT</th>
                                <th>QTY</th>
                                
                                <th>UNIT PRICE</th>
                                <th>SUB PRICE</th>
                                <th>TOTAL PRICE</th>
                                <th>DATE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ( isset( $sales ) ):?>
                            <?php foreach($sales as $item): ?>
                                <tr>
     
                                    <td><?php echo $item->cli_name?></td>
                                    <td><?php echo $item->bra_name?></td>
                                    <td><?php echo $item->pro_name?></td>
                                    <td><?php echo $item->sai_qty?></td>
                                    
                                    <td>₱ <?php echo number_format( $item->sai_price, 2) ?></td>
                                    <td>₱ <?php echo number_format( $item->sai_sub_total, 2) ?></td>
                                    <td>₱ <?php echo number_format( $item->sal_total, 2) ?></td>
                                    <td><?php echo date("F j, Y, g:i a",strtotime($item->sat_created)) ?></td>
                                    <?php $grand_sub = $grand_sub + $item->sai_sub_total?>
                                    <?php $grand_total = $grand_total + $item->sal_total?>
                                </tr>   
                            <?php endforeach; ?>
                            <?php endif;?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><b>₱ <?php echo number_format( $grand_sub, 2) ?></b></td>
                                <td><b>₱ <?php echo number_format( $grand_total, 2) ?></b></td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>  