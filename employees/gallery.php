<?php 
 $base_url ='/hrm_system/';
 ?>

<?php include '../includes/header.php'; ?>
<?php
include 'edit_employee.php';
$employee_id = $_GET['employee_id']; 
$sql = "SELECT mydocuments FROM emp_documents WHERE employee_id = $employee_id";
$result = $conn->query($sql);
$images = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $images[] = $row['mydocuments'];
    }
}
?>

<div class="container py-4">
    <h2 class="mb-4">Documents</h2>

    <!-- Upload Form -->
    <div class="mb-4">
        <form action="upload_document.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="employee_id" value="<?php echo $employee_id; ?>">
            <div class="mb-3">
                <label for="document" class="form-label">Upload New Document</label>
                <input type="file" class="form-control" id="document" name="document" accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    </div>

    <!-- Gallery -->
    <div class="row gallery">
        <?php if (count($images) > 0): ?>
        <?php foreach ($images as $img): ?>
        <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="card position-relative">
                <img src="../assets/documents/<?php echo $img; ?>" class="card-img-top" alt="Employee Image"
                    ondblclick="showEnlargedImage('../assets/documents/<?php echo $img; ?>')">
                <button class="btn btn-danger btn-sm delete-btn"
                    onclick="deleteImage('<?php echo $img; ?>', '<?php echo $employee_id; ?>')">
                    Delete
                </button>
            </div>
        </div>
        <?php endforeach; ?>
        <?php else: ?>
        <div class="col-12">
            <p>No images found for this employee.</p>
        </div>
        <?php endif; ?>
    </div>
</div>

<!-- Bootstrap Modal for Enlarged Image -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img id="enlargedImage" src="" alt="Enlarged Employee Image">
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS and Custom Script -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
function showEnlargedImage(imgSrc) {
    document.getElementById('enlargedImage').src = imgSrc;
    const modal = new bootstrap.Modal(document.getElementById('imageModal'));
    modal.show();
}

function deleteImage(filename, employeeId) {
    if (confirm("Are you sure you want to delete this document?")) {
        fetch(`delete_document.php?filename=${filename}&employee_id=${employeeId}`)
            .then(res => res.text())
            .then(response => {
                if (response.trim() === "success") {
                    location.reload();
                } else {
                    alert("Failed to delete image: " + response);
                }
            });
    }
}
</script>

</body>

</html>