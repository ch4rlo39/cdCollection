<?php
$urlToRestApi = $this->Url->build('/api/genre_families', true);
echo $this->Html->scriptBlock('var urlToRestApi = "' . $urlToRestApi . '";', ['block' => true]);
echo $this->Html->script('GenreFamilies/index', ['block' => 'scriptBottom']);
?>

<div class="container">
    <div class="row">
        <div class="col-md-12 head">
            <h5>Genre Families</h5>
            <div class="float-right">
                <a href="javascript:void(0);" class="btn btn-success" data-type="add" data-toggle="modal" data-target="#modalGenreFamilyAddEdit"><i class="plus"></i>New Genre Family</a>
            </div>
        </div>
        <div class="statusMsg"></div>
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="genreFamilyData">
                <?php if(!empty($genreFamilies)) {
                    foreach ($genreFamilies as $row) { ?>
                <tr>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['name'] ?></td>
                    <td>
                        <a href="javascript:void(0);" class="btn btn-warning"
                           rowID="<?php echo $row['id']; ?>" data-type="edit"
                           data-toggle="modal" data-target="#modalGenreFamilyAddEdit">
                            edit
                        </a>
                        <a href="javascript:void(0);" class="btn btn-danger"
                           onclick="return confirm('Are you sure to delete data?') ? 
                                genreFamilyAction('delete', '<?php echo $row['id']; ?>') : false;">
                            delete
                        </a>
                    </td>
                </tr>
                <?php }
                } else { ?>
                    <tr><td colspan="5">No genre family found ...</td></tr>
                
                <?php }?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="modalGenreFamilyAddEdit" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add new genre family</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <div class="modal-body">
                <div class="statusMsg"></div>
                <form role="form">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter the name">
                    </div>
                    <input type="hidden" class="form-control" name="id" id="id">
                </form>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" id="genreFamilySubmit">SUBMIT</button>
            </div>
        </div>
    </div>
</div>
</body>
</html>