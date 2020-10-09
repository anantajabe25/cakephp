<div class="row-fluid">
	<div class="alert alert-info">
		<h3>File Upload Question</h3>
	</div>

	<p>Complete the File Upload feature and import the attached <?php echo $this->Html->link('<i class="icon-share
"></i> CSV file', '/files/FileUpload.csv', array('escape' => false)); ?>. Imported data will be shown below.</p>
	<p><em>* score will be given for filetype/mimetype checks</em></p>

	<hr />

	<div class="alert">
		<h3>Import Form</h3>
	</div>
<?php
echo $this->Form->create('FileUpload', array('enctype' => 'multipart/form-data'));
echo $this->Form->input('file', array('label' => 'File Upload', 'type' => 'file'));
echo $this->Form->submit('Upload', array('class' => 'btn btn-primary'));
echo $this->Form->end();
?>

	<hr />

	<div class="alert alert-success">
		<h3>Data Imported</h3>
	</div>

	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Email</th>
				<th>Created</th>
			</tr>
		</thead>
		<tbody>
<?php
if ($this->request && $this->request->is('post')) {
	$count = 1;
    if (!empty($this->request->data['FileUpload']['file']['name'] && $this->request->data['FileUpload']['file']['type']==='text/csv')) {
        $fileName = $this->request->data['FileUpload']['file']['name'];
        $file_uploads = array_map('str_getcsv', file($this->request->data['FileUpload']['file']['tmp_name']));
        echo "<pre>";
        if (count($file_uploads) > 0) {
            array_splice($file_uploads, 0, 1);
            // $file_uploads = array_shift($file_uploads);
            foreach ($file_uploads as $file_upload):
            ?>
					<tr>
						<td><?php echo $count; ?>
						<td><?php echo $file_upload[0]; ?>
						<td><?php echo $file_upload[1]; ?>
						<td><?php echo date("Y-m-d H:i:s"); ?>
					</tr>
		<?php
$count++;
            endforeach;
        }
    } else {
        $this->Flash->error(__('Please choose a file to upload.'));
    }
}
?>
		</tbody>
	</table>
</div>
