function sortTable(columnIndex, dataType) {
    const tableBody = document.getElementById("rapportTable");
    let rows = Array.from(tableBody.getElementsByTagName("tr"));
    let direction = tableBody.getAttribute("data-sort-direction") === "asc" ? "desc" : "asc";

    // Store the current sorting direction for future use
    tableBody.setAttribute("data-sort-direction", direction);

    // Update icon directions
    document.querySelectorAll('.fa-sort').forEach(icon => {
        icon.className = 'fas fa-sort'; // Reset all icons
    });

    const currentIcon = document.getElementById(`sort-icon-${columnIndex}`);
    if (direction === 'asc') {
        currentIcon.className = 'fas fa-sort-up';
    } else {
        currentIcon.className = 'fas fa-sort-down';
    }

    rows.sort((a, b) => {
        const cellA = a.getElementsByTagName("td")[columnIndex].innerText.trim().toLowerCase();
        const cellB = b.getElementsByTagName("td")[columnIndex].innerText.trim().toLowerCase();

        if (dataType === 'date') {
            const dateA = new Date(cellA);
            const dateB = new Date(cellB);
            if (direction === "asc") {
                return dateA - dateB;
            } else {
                return dateB - dateA;
            }
        } else if (dataType === 'string') {
            if (direction === "asc") {
                return cellA.localeCompare(cellB);
            } else {
                return cellB.localeCompare(cellA);
            }
        } else {
            return 0;
        }
    });

    // Clear existing rows and append sorted rows
    tableBody.innerHTML = "";
    rows.forEach(row => tableBody.appendChild(row));
}