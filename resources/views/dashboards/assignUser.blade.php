@extends('layouts.dashlayout')
<style>
    .custom-dropdown {
        position: relative;
        display: inline-block;
        margin-bottom: 10px;
    }

    .checkbox-list {
        max-height: 150px;
        overflow-y: auto;
        border: 1px solid #ccc;
        padding: 5px;
        margin-bottom: 10px; /* Added margin for better separation */
    }

    .checkbox-list label {
        display: block;
        margin-bottom: 5px;
    }

    .checkbox-list input {
        margin-right: 5px;
    }

    .selected-item {
        background-color: #e2f0ff;
        border-radius: 5px;
        padding: 5px;
        margin-right: 5px;
        margin-bottom: 5px;
        display: inline-block;
    }

    .close-icon {
        cursor: pointer;
        margin-left: 5px;
    }
</style>

@section('content')
    <div class="container-fluid">
        <div class="h-100 bg-light rounded p-4">
            <h2>Assign Artist and Partner to "{{ $project->name }}"</h2>

            <!-- Display project information here -->
            <p><strong>Project Name:</strong> {{ $project->name }}</p>
            <p><strong>Description:</strong> {{ $project->description }}</p>

            <!-- Display already assigned artists -->
            <p><strong>Assigned Artists:</strong></p>
            @if ($project->users->count() > 0)
                @foreach ($project->users as $assignedArtist)
                    <p>{{ $assignedArtist->name }}</p>
                @endforeach
            @else
                <p>No artists assigned to this project.</p>
            @endif

            <!-- Display already assigned partners -->
            <p><strong>Assigned Partners:</strong></p>
            @if ($project->partners->count() > 0)
                @foreach ($project->partners as $assignedPartner)
                    <p>{{ $assignedPartner->name }}</p>
                @endforeach
            @else
                <p>No partners assigned to this project.</p>
            @endif

            <!-- Form to select an artist or partner -->
            <form id="assignForm_{{ $project->id }}" action="{{ route('assign', $project->id) }}" method="post" onsubmit="return validateSelection()">
                @csrf

                <!-- Custom dropdown for selecting artists with checkboxes -->
                <!-- Input to display selected artists -->
                <div class="selected-items-input" id="selectedArtistsInput"></div>
                <div class="custom-dropdown">
                    <label for="artistCheckboxes">Select Artists:</label>
                    <div class="checkbox-list" id="selectedArtistsList">
                        @foreach ($availableArtists as $artist)
                            <label class="selected-item">
                                <input type="checkbox" name="artists[]" id="artistCheckbox_{{ $artist->id }}" value="{{ $artist->id }}" onchange="updateSelectedItems('selectedArtistsList', 'selectedArtistsInput')">
                                {{ $artist->name }}
                                <span class="close-icon" onclick="removeSelectedItem('selectedArtistsList', 'selectedArtistsInput', 'artistCheckbox_{{ $artist->id }}', {{ $artist->id }})">&times;</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <!-- Custom dropdown for selecting partners with checkboxes -->
                <!-- Input to display selected partners -->
                <div class="selected-items-input" id="selectedPartnersInput"></div>
                <div class="custom-dropdown">
                    <label for="partnerCheckboxes">Select Partners:</label>
                    <div class="checkbox-list" id="selectedPartnersList">
                        @foreach ($availablePartners as $partner)
                            <label class="selected-item">
                                <input type="checkbox" name="partners[]" id="partnerCheckbox_{{ $partner->id }}" value="{{ $partner->id }}" onchange="updateSelectedItems('selectedPartnersList', 'selectedPartnersInput')">
                                {{ $partner->name }}
                                <span class="close-icon" onclick="removeSelectedItem('selectedPartnersList', 'selectedPartnersInput', 'partnerCheckbox_{{ $partner->id }}', {{ $partner->id }})">&times;</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <!-- Assign button for artists or partners -->
                <button type="submit" class="btn btn-sm btn-success">Assign</button>
        </form>
        </div>
    </div>

    <script>
        
        // Function to check if at least one artist or partner is selected
    // function validateSelection() {
    //     var selectedArtistsList = document.getElementById('selectedArtistsList');
    //     var selectedPartnersList = document.getElementById('selectedPartnersList');

    //     var selectedArtists = selectedArtistsList.querySelectorAll('input[name="artists[]"]:checked');
    //     var selectedPartners = selectedPartnersList.querySelectorAll('input[name="partners[]"]:checked');

    //     if (selectedArtists.length === 0 && selectedPartners.length === 0) {
    //         alert('Please select at least one artist or partner for assignment.');
    //         return false;
    //     }

    //     return true;
    // }

// Function to remove selected item
function removeSelectedItem(selectedItemsListId, selectedItemsInputId, checkboxId, itemId) {
    // Find the selected item in the list
    var listItem = document.getElementById(selectedItemsListId).querySelector(`[id="${checkboxId}"]`);

    // Uncheck the corresponding checkbox without removing it
    var checkbox = document.getElementById(checkboxId);
    if (checkbox) {
        checkbox.checked = false;
    }

    // If the item is found, trigger a change event to update the input
    if (listItem) {
        // Trigger change event after unchecking the checkbox
        var event = new Event('change');
        checkbox.dispatchEvent(event);

        // Remove the selected item from the list
        listItem.parentNode.removeChild(listItem);

        // Update selected items for the specific dropdown
        updateSelectedItems(selectedItemsListId, selectedItemsInputId);
    }
}



        // Function to update selected items list
        function updateSelectedItems(selectedItemsListId, selectedItemsInputId) {
            var selectedItemsList = document.getElementById(selectedItemsListId);
            var selectedItemsInput = document.getElementById(selectedItemsInputId);

            var selectedItems = Array.from(selectedItemsList.querySelectorAll('input[name="artists[]"]:checked, input[name="partners[]"]:checked')).map(function (checkbox) {
                return checkbox.parentNode.outerHTML;
            }).join('');

            selectedItemsInput.innerHTML = selectedItems;
        }
    </script>
@endsection
