function toggleActions(event) {
    // Prevent the click event from propagating to the button
    event.stopPropagation();
    
    // Find the closest action buttons container
    const actionButtons = event.target.closest('.relative').querySelector('.action-buttons');
    
    // Toggle visibility of the action buttons
    if (actionButtons) {
        actionButtons.classList.toggle('hidden');
    }
}

// Optionally, hide the buttons when clicking outside
document.addEventListener('click', function(event) {
    const actionButtons = document.querySelectorAll('.action-buttons');
    actionButtons.forEach(button => {
        if (!button.contains(event.target) && !button.previousElementSibling.contains(event.target)) {
            button.classList.add('hidden');
        }
    });
});
