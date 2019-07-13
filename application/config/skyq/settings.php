<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	$config['settings']['default_date_format'] = 'Y-m-d';
	$config['settings']['default_time_format'] = 'h:i:s';
	$config['settings']['default_time_zone'] = 'UP45';
	$config['settings']['default_login_page'] = 'Login';
	$config['settings_menu'] = array(
			'Academic' => array(
				array(
					'Title'=>'Courses',
					'Link' => 'Course',
					'Icon' => 'shield',
					'color'=>'primary'
				),
				array(
					'Title'=>'Batchs',
					'Link' => 'Batch',
					'Icon' => 'users',
					'color'=>'primary'
				),
				array(
					'Title'=>'Subjects',
					'Link' => 'Subject',
					'Icon' => 'book',
					'color'=>'primary'
				),
				array(
					'Title'=>'Chapters',
					'Link' => 'lesson',
					'Icon' => 'file-text-o',
					'color'=>'primary'
				),
				array(
					'Title'=>'Topic',
					'Link' => 'topic',
					'Icon' => 'file-text',
					'color'=>'primary'
				)
			),
			'Marketing' => array(
				array(
					'Title'=>'Abort Reasons',
					'Link' => 'abort',
					'Icon' => 'ban',
					'color'=>'warning'
				),
				array(
					'Title'=>'Message Name',
					'Link' => 'sms',
					'Icon' => 'comment',
					'color'=>'warning'
				),
				array(
					'Title'=>'Message Type',
					'Link' => 'message_type',
					'Icon' => 'font',
					'color'=>'warning'
				)
			),
			'General' => array(
				/*array(
					'Title'=>'Business Category',
					'Link' => 'business_category',
					'Icon' => 'universal-access'
				),*/
				array(
					'Title'=>'Designations',
					'Link' => 'designation',
					'Icon' => 'shield',
					'color'=>'success'
				),
				
				array(
					'Title'=>'Vendor Categories',
					'Link' => 'Business_category',
					'Icon' => 'briefcase',
					'color'=>'success'
				)
				,
				array(
					'Title'=>'Awards',
					'Link' => 'awards',
					'Icon' => 'trophy',
					'color'=>'success'
				),
				array(
					'Title'=>'Departments',
					'Link' => 'task_type',
					'Icon' => 'tasks',
					'color'=>'success'
				),
				array(
					'Title'=>'Communication Settings',
					'Link' => 'communicate/communication_setting',
					'Icon' => 'cogs',
					'color'=>'success'
				),
				array(
					'Title'=>'Banks',
					'Link' => 'bank',
					'Icon' => 'university',
					'color'=>'success'
				)
			)
	);	

	$config['help_category'] = array(
			'Help' => array( 				
				array(
					'Title'=>'Help Category',
					'Link' => 'settings/add_help_category_form',
					'Icon' => 'question-circle'
				),
				  array(
					'Title'=>'Help Sub-Category',
					'Link' => 'settings/add_help_form',
					'Icon' => 'question'
				)
			)
		);


	$config['Backup'] = array(
			'Backup' => array(				 
				 array(
					'Title'=>'Full Backup',
					'Link' => 'settings/add_full_backup_form',
					'Icon' => 'archive'
				),
				 array(
					'Title'=>'Data Backup',
					'Link' => 'settings/add_data_backup_form',
					'Icon' => 'folder-open'
				)
			)
		);
?>