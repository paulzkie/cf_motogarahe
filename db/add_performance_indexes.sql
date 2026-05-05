-- Defensive index migration for the busiest public queries.
-- Safe to rerun on shared hosting: no stored procedures required.
-- In phpMyAdmin, select the target database first before importing this file.

-- motorcycles.idx_motorcycles_status_created
SET @idx_exists := (
        SELECT COUNT(*)
            FROM information_schema.statistics
         WHERE table_schema = DATABASE()
             AND table_name = 'motorcycles'
             AND index_name = 'idx_motorcycles_status_created'
);
SET @col_count := (
        SELECT COUNT(*)
            FROM information_schema.columns
         WHERE table_schema = DATABASE()
             AND table_name = 'motorcycles'
             AND column_name IN ('mot_status', 'mot_created')
);
SET @sql := IF(
        @idx_exists = 0 AND @col_count = 2,
        'ALTER TABLE `motorcycles` ADD INDEX `idx_motorcycles_status_created` (`mot_status`, `mot_created`)',
        'SELECT ''SKIP: motorcycles.idx_motorcycles_status_created'' AS message'
);
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- motorcycles.idx_motorcycles_slug
SET @idx_exists := (
        SELECT COUNT(*)
            FROM information_schema.statistics
         WHERE table_schema = DATABASE()
             AND table_name = 'motorcycles'
             AND index_name = 'idx_motorcycles_slug'
);
SET @col_count := (
        SELECT COUNT(*)
            FROM information_schema.columns
         WHERE table_schema = DATABASE()
             AND table_name = 'motorcycles'
             AND column_name IN ('mot_slug')
);
SET @sql := IF(
        @idx_exists = 0 AND @col_count = 1,
        'ALTER TABLE `motorcycles` ADD INDEX `idx_motorcycles_slug` (`mot_slug`)',
        'SELECT ''SKIP: motorcycles.idx_motorcycles_slug'' AS message'
);
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- motorcycles.idx_motorcycles_brand
SET @idx_exists := (
        SELECT COUNT(*)
            FROM information_schema.statistics
         WHERE table_schema = DATABASE()
             AND table_name = 'motorcycles'
             AND index_name = 'idx_motorcycles_brand'
);
SET @col_count := (
        SELECT COUNT(*)
            FROM information_schema.columns
         WHERE table_schema = DATABASE()
             AND table_name = 'motorcycles'
             AND column_name IN ('mot_brand')
);
SET @sql := IF(
        @idx_exists = 0 AND @col_count = 1,
        'ALTER TABLE `motorcycles` ADD INDEX `idx_motorcycles_brand` (`mot_brand`)',
        'SELECT ''SKIP: motorcycles.idx_motorcycles_brand'' AS message'
);
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- motorcycles_pictures.idx_motorcycles_pictures_mot_status
SET @idx_exists := (
        SELECT COUNT(*)
            FROM information_schema.statistics
         WHERE table_schema = DATABASE()
             AND table_name = 'motorcycles_pictures'
             AND index_name = 'idx_motorcycles_pictures_mot_status'
);
SET @col_count := (
        SELECT COUNT(*)
            FROM information_schema.columns
         WHERE table_schema = DATABASE()
             AND table_name = 'motorcycles_pictures'
             AND column_name IN ('mot_id', 'mop_status')
);
SET @sql := IF(
        @idx_exists = 0 AND @col_count = 2,
        'ALTER TABLE `motorcycles_pictures` ADD INDEX `idx_motorcycles_pictures_mot_status` (`mot_id`, `mop_status`)',
        'SELECT ''SKIP: motorcycles_pictures.idx_motorcycles_pictures_mot_status'' AS message'
);
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- dealers_motorcycles.idx_dealers_motorcycles_mot_status
SET @idx_exists := (
        SELECT COUNT(*)
            FROM information_schema.statistics
         WHERE table_schema = DATABASE()
             AND table_name = 'dealers_motorcycles'
             AND index_name = 'idx_dealers_motorcycles_mot_status'
);
SET @col_count := (
        SELECT COUNT(*)
            FROM information_schema.columns
         WHERE table_schema = DATABASE()
             AND table_name = 'dealers_motorcycles'
             AND column_name IN ('mot_id', 'dem_status')
);
SET @sql := IF(
        @idx_exists = 0 AND @col_count = 2,
        'ALTER TABLE `dealers_motorcycles` ADD INDEX `idx_dealers_motorcycles_mot_status` (`mot_id`, `dem_status`)',
        'SELECT ''SKIP: dealers_motorcycles.idx_dealers_motorcycles_mot_status'' AS message'
);
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- dealers_motorcycles.idx_dealers_motorcycles_branch_status
SET @idx_exists := (
        SELECT COUNT(*)
            FROM information_schema.statistics
         WHERE table_schema = DATABASE()
             AND table_name = 'dealers_motorcycles'
             AND index_name = 'idx_dealers_motorcycles_branch_status'
);
SET @col_count := (
        SELECT COUNT(*)
            FROM information_schema.columns
         WHERE table_schema = DATABASE()
             AND table_name = 'dealers_motorcycles'
             AND column_name IN ('deb_id', 'dem_status')
);
SET @sql := IF(
        @idx_exists = 0 AND @col_count = 2,
        'ALTER TABLE `dealers_motorcycles` ADD INDEX `idx_dealers_motorcycles_branch_status` (`deb_id`, `dem_status`)',
        'SELECT ''SKIP: dealers_motorcycles.idx_dealers_motorcycles_branch_status'' AS message'
);
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- dealers_branches.idx_dealers_branches_dealer_branch
SET @idx_exists := (
        SELECT COUNT(*)
            FROM information_schema.statistics
         WHERE table_schema = DATABASE()
             AND table_name = 'dealers_branches'
             AND index_name = 'idx_dealers_branches_dealer_branch'
);
SET @col_count := (
        SELECT COUNT(*)
            FROM information_schema.columns
         WHERE table_schema = DATABASE()
             AND table_name = 'dealers_branches'
             AND column_name IN ('dea_id', 'deb_id')
);
SET @sql := IF(
        @idx_exists = 0 AND @col_count = 2,
        'ALTER TABLE `dealers_branches` ADD INDEX `idx_dealers_branches_dealer_branch` (`dea_id`, `deb_id`)',
        'SELECT ''SKIP: dealers_branches.idx_dealers_branches_dealer_branch'' AS message'
);
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- inquiries_new.idx_inquiries_new_dealer_created
SET @idx_exists := (
        SELECT COUNT(*)
            FROM information_schema.statistics
         WHERE table_schema = DATABASE()
             AND table_name = 'inquiries_new'
             AND index_name = 'idx_inquiries_new_dealer_created'
);
SET @col_count := (
        SELECT COUNT(*)
            FROM information_schema.columns
         WHERE table_schema = DATABASE()
             AND table_name = 'inquiries_new'
             AND column_name IN ('dea_id', 'inq_created')
);
SET @sql := IF(
        @idx_exists = 0 AND @col_count = 2,
        'ALTER TABLE `inquiries_new` ADD INDEX `idx_inquiries_new_dealer_created` (`dea_id`, `inq_created`)',
        'SELECT ''SKIP: inquiries_new.idx_inquiries_new_dealer_created'' AS message'
);
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- inquiries_new.idx_inquiries_new_mot_branch
SET @idx_exists := (
        SELECT COUNT(*)
            FROM information_schema.statistics
         WHERE table_schema = DATABASE()
             AND table_name = 'inquiries_new'
             AND index_name = 'idx_inquiries_new_mot_branch'
);
SET @col_count := (
        SELECT COUNT(*)
            FROM information_schema.columns
         WHERE table_schema = DATABASE()
             AND table_name = 'inquiries_new'
             AND column_name IN ('mot_id', 'deb_id')
);
SET @sql := IF(
        @idx_exists = 0 AND @col_count = 2,
        'ALTER TABLE `inquiries_new` ADD INDEX `idx_inquiries_new_mot_branch` (`mot_id`, `deb_id`)',
        'SELECT ''SKIP: inquiries_new.idx_inquiries_new_mot_branch'' AS message'
);
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- inventory_info.idx_inventory_info_mot_type_to
SET @idx_exists := (
        SELECT COUNT(*)
            FROM information_schema.statistics
         WHERE table_schema = DATABASE()
             AND table_name = 'inventory_info'
             AND index_name = 'idx_inventory_info_mot_type_to'
);
SET @col_count := (
        SELECT COUNT(*)
            FROM information_schema.columns
         WHERE table_schema = DATABASE()
             AND table_name = 'inventory_info'
             AND column_name IN ('mot_id', 'ini_type', 'bra_id_to')
);
SET @sql := IF(
        @idx_exists = 0 AND @col_count = 3,
        'ALTER TABLE `inventory_info` ADD INDEX `idx_inventory_info_mot_type_to` (`mot_id`, `ini_type`, `bra_id_to`)',
        'SELECT ''SKIP: inventory_info.idx_inventory_info_mot_type_to'' AS message'
);
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- inventory_info.idx_inventory_info_mot_type_from
SET @idx_exists := (
        SELECT COUNT(*)
            FROM information_schema.statistics
         WHERE table_schema = DATABASE()
             AND table_name = 'inventory_info'
             AND index_name = 'idx_inventory_info_mot_type_from'
);
SET @col_count := (
        SELECT COUNT(*)
            FROM information_schema.columns
         WHERE table_schema = DATABASE()
             AND table_name = 'inventory_info'
             AND column_name IN ('mot_id', 'ini_type', 'bra_id_from')
);
SET @sql := IF(
        @idx_exists = 0 AND @col_count = 3,
        'ALTER TABLE `inventory_info` ADD INDEX `idx_inventory_info_mot_type_from` (`mot_id`, `ini_type`, `bra_id_from`)',
        'SELECT ''SKIP: inventory_info.idx_inventory_info_mot_type_from'' AS message'
);
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- sales.idx_sales_branch_status
SET @idx_exists := (
        SELECT COUNT(*)
            FROM information_schema.statistics
         WHERE table_schema = DATABASE()
             AND table_name = 'sales'
             AND index_name = 'idx_sales_branch_status'
);
SET @col_count := (
        SELECT COUNT(*)
            FROM information_schema.columns
         WHERE table_schema = DATABASE()
             AND table_name = 'sales'
             AND column_name IN ('bra_id', 'sal_status')
);
SET @sql := IF(
        @idx_exists = 0 AND @col_count = 2,
        'ALTER TABLE `sales` ADD INDEX `idx_sales_branch_status` (`bra_id`, `sal_status`)',
        'SELECT ''SKIP: sales.idx_sales_branch_status'' AS message'
);
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- sales_info.idx_sales_info_mot_sale
SET @idx_exists := (
        SELECT COUNT(*)
            FROM information_schema.statistics
         WHERE table_schema = DATABASE()
             AND table_name = 'sales_info'
             AND index_name = 'idx_sales_info_mot_sale'
);
SET @col_count := (
        SELECT COUNT(*)
            FROM information_schema.columns
         WHERE table_schema = DATABASE()
             AND table_name = 'sales_info'
             AND column_name IN ('mot_id', 'sal_id')
);
SET @sql := IF(
        @idx_exists = 0 AND @col_count = 2,
        'ALTER TABLE `sales_info` ADD INDEX `idx_sales_info_mot_sale` (`mot_id`, `sal_id`)',
        'SELECT ''SKIP: sales_info.idx_sales_info_mot_sale'' AS message'
);
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- stocks.idx_stocks_branch_stock
SET @idx_exists := (
        SELECT COUNT(*)
            FROM information_schema.statistics
         WHERE table_schema = DATABASE()
             AND table_name = 'stocks'
             AND index_name = 'idx_stocks_branch_stock'
);
SET @col_count := (
        SELECT COUNT(*)
            FROM information_schema.columns
         WHERE table_schema = DATABASE()
             AND table_name = 'stocks'
             AND column_name IN ('bra_id', 'sto_id')
);
SET @sql := IF(
        @idx_exists = 0 AND @col_count = 2,
        'ALTER TABLE `stocks` ADD INDEX `idx_stocks_branch_stock` (`bra_id`, `sto_id`)',
        'SELECT ''SKIP: stocks.idx_stocks_branch_stock'' AS message'
);
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- stocks_info.idx_stocks_info_mot_stock
SET @idx_exists := (
        SELECT COUNT(*)
            FROM information_schema.statistics
         WHERE table_schema = DATABASE()
             AND table_name = 'stocks_info'
             AND index_name = 'idx_stocks_info_mot_stock'
);
SET @col_count := (
        SELECT COUNT(*)
            FROM information_schema.columns
         WHERE table_schema = DATABASE()
             AND table_name = 'stocks_info'
             AND column_name IN ('mot_id', 'sto_id')
);
SET @sql := IF(
        @idx_exists = 0 AND @col_count = 2,
        'ALTER TABLE `stocks_info` ADD INDEX `idx_stocks_info_mot_stock` (`mot_id`, `sto_id`)',
        'SELECT ''SKIP: stocks_info.idx_stocks_info_mot_stock'' AS message'
);
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
