
document.addEventListener('DOMContentLoaded', function () {

    document.getElementById('addArtistForm').addEventListener('submit', function (event) {
        event.preventDefault();

        // Get form data
        const formData = new FormData(this);

        // Perform AJAX request to store the artist data
        fetch('/profile', {
            method: 'POST',
            body: formData,
        })
            .then(response => response.json())
            .then(data => {
                // Check if the request was successful
                if (data.success) {

                    // Reset form inputs
                    this.reset();
                    // Close the modal after successful submission
                    $('#addArtistModal').modal('hide');

                    // Create HTML for the new artist
                    const newArtist = data.artist;
                    const artistHtml = `
                    <tr>
                        <td>${newArtist.id}</td>
                        <td>${newArtist.name}</td>
                        <td>${newArtist.status}</td>
                        <td>${newArtist.role.name}</td>
                        <td>${newArtist.email}</td>
                        <td>${newArtist.phone}</td>
                        <td>${newArtist.address}</td>
                    </tr>
                `;

                    // Append the new artist to the table body
                    const artistTableBody = document.querySelector('#artistsTableBody');
                    artistTableBody.insertAdjacentHTML('beforeend', artistHtml);

                    // Show success message with SweetAlert
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: data.message,  // Assuming your backend sends a success message
                    });

                    // Optionally, reload or update the artists table
                } else {
                    // Show error message with SweetAlert
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: data.error,  // Assuming your backend sends an error message
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                // Show error message with SweetAlert
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'An unexpected error occurred.',
                });
            });
    });




    document.getElementById('addArtProjectForm').addEventListener('submit', function (event) {
        event.preventDefault();

        const formData = new FormData(this);

        fetch('/art-projects', {
            method: 'POST',
            body: formData,
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {

                    this.reset();
                    $('#addArtProjecttModal').modal('hide');

                    const newArtProject = data.artProject;
                    const artProjectHtml = `
                    <tr>
                        <td>${newArtProject.id}</td>
                        <td>${newArtProject.name}</td>
                        <td>${newArtProject.description}</td>
                        <td>${newArtProject.status}</td>
                        <td>${newArtProject.budget}</td>
                        <td>${newArtProject.start_date}</td>
                        <td>${newArtProject.end_date}</td>
                        <!-- Add other columns as needed -->
                    </tr>
                `;

                    const artProjectTableBody = document.querySelector('#artProjectsTableBody');
                    artProjectTableBody.insertAdjacentHTML('beforeend', artProjectHtml);

                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: data.message,
                    });
                } else {
                    // Show error message
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: data.error,
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                // Show error message with SweetAlert
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'An unexpected error occurred.',
                });
            });
    });



    document.getElementById('add-partner-button').addEventListener('click', function () {

        document.getElementById('add-partner-form').style.display = 'table-row';
    });
    // Handle form submission
    document.getElementById('submitPartnerForm').addEventListener('click', function () {

        event.preventDefault();

        const formData = new FormData(document.getElementById('partnerForm'));

        fetch('/partners', {
            method: 'POST',
            body: formData,
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('partnerForm').reset();
                    document.getElementById('add-partner-form').style.display = 'none';

                    const newPartner = data.partner;
                    const partnerTableBody = document.querySelector('#partnerTableBody');
                    const partnerHtml = `
            <tr>
                <td>${newPartner.id}</td>
                <td>${newPartner.name}</td>
                <td>${newPartner.contact_info}</td>
                <td>${newPartner.description}</td>
                <td>
                    <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editPartnerModal_${newPartner.id}">Edit</button>
                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deletePartnerModal_${newPartner.id}">Delete</button>
                </td>
            </tr>
        `;

                    partnerTableBody.insertAdjacentHTML('beforeend', partnerHtml);

                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: data.message,
                    });
        
                    // Optionally, update or reload the partners table
                } else {
                    // Show error message with SweetAlert
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: data.error,
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'An unexpected error occurred.',
                });
            });
    });
    document.getElementById('close-partner-form').addEventListener('click', function () {

        document.getElementById('add-partner-form').style.display = 'none';
    });

});
