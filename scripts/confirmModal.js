let itemIdToDelete = null;

function showConfirmModal(itemId) {
    itemIdToDelete = itemId;
    document.getElementById('confirmModal').style.display = 'flex';
}

function closeModal() {
    document.getElementById('confirmModal').style.display = 'none';
}

function deleteItem() {
    if (itemIdToDelete !== null) {
        window.location.href = '../php/delete_book.php?id=' + itemIdToDelete;
    }
}