
// *********** Start js code for office component tree  ************


let officeApi = window.location.origin;

function allOffices(initialOfficeId, base, isTree) {

    let officeApiEndPoint = '';
    if(!base){
        officeApiEndPoint = officeApi + "/getOffices";
    }else{
        officeApiEndPoint = officeApi + "/getOffices/" + base + "/" + isTree;
    }



    fetch(officeApiEndPoint)
        .then((response) => response.json())
        .then((data) => {
            if (data.offices == '') {
                initialOfficeId.innerHTML = "<span class='text-danger'>No Office Found ! </span>";
                return false;
            }
            initialOfficeId.innerHTML = data.offices;
            $(initialOfficeId).select2();

        })
        .catch((error) => {
            console.log('Error:', error);
        });

}

function populateOfficeTree(initialOfficeTree) {
    Array(initialOfficeTree).forEach((office) => {
        let base = office.dataset.base_id ?? null;
        let isTree = office.dataset.is_tree ?? null;

        let office_uuid = office.id + "_uuid";
        let office_title = office.id + "_title";


        let initialOfficeId = document.getElementById(office.id);

        allOffices(initialOfficeId, base , isTree, office_uuid, office_title);
    });
}

function getChildOffices(officeId, childrenSection) {

    let targetLocation = childrenSection;
    let apiEndPoint = officeApi + "/get_child_office/" + officeId;
    fetch(apiEndPoint)
        .then((response) => response.json())
        .then((data) => {
            if (data.offices == '') {
                targetLocation.innerHTML = "<span class='text-danger'>No Office Found ! </span>";
                targetLocation.innerHTML = '';
                return false;
            }
            targetLocation.innerHTML = `
                <option value=""> Root/Top node </option>${data.offices}
            `;
            $(targetLocation).select2();
        })
        .catch((error) => {
            console.log('Error:', error);
        });
}

function targetOffices(element) {

    let id = element.id;
    let value = element.value;
    let children = element.dataset.children_identifier;
    let base = element.dataset.base;
    let childrenSection = document.getElementById(children);

    getChildOffices(value, childrenSection);
}

// *********** End office component  ************


///   Start appointment component

function populateAppointments(initialAppointment) {
    Array(initialAppointment).forEach((designation) => {
        let designationId = document.getElementById(designation.id);
        let formatSub = designation.id + '_designationContent';

        function getAppointments() {
            let apiEndPoint = officeApi + '/get_appointments';
            fetch(apiEndPoint)
                .then((response) => response.json())
                .then((data) => {
                    if (data.appointments == '') {
                        designationId.innerHTML = "<span class='text-danger'>No Office Found ! </span>";
                        return false;
                    }
                    designationId.innerHTML = `
                            <select class="form-control select-section select2" name="designation_id" onchange="getAppointmentData(this)" data-designation_content="${formatSub}" >
                                ${data.appointments}
                            </select>
                        `;
                    $(designationId).select2();
                })
                .catch((error) => {
                    console.error('Error:', error);
                });
        }
        getAppointments();
    });
}

function getAppointmentData(event) {
    let appointment = event.value;
    let dataset = event.dataset;
    getDesignationData(appointment, dataset);
}

function getDesignationData(value, dataset) {
    let apiEndPoint = officeApi + "/get_designation_info" + '/' + value;

    let designationContent = dataset.designation_content;
    designationContentId = document.getElementById(designationContent);

    fetch(apiEndPoint)
        .then((response) => response.json())
        .then((data) => {

            let options = '<option value="">Select Appointment</option>';

            data.designations.forEach(element => {
                options += `<option data-uuid='${element.uuid }' value='${element.id}'>${element.name}</option>`;
            });

            designationContentId.innerHTML = `

                    <select class="form-control select-search select-section select2" name="appointment_id">
                        ${options}
                    </select>
                `;
            $(designationContentId).select2();
        })
        .catch((error) => {
            console.error('Error:', error);
        });
}
///   End appointment component


//// Start Role Component

function populateRoles(initialRoles) {
    let apiEndPoint = officeApi + '/get_roles';
    Array(initialRoles).forEach(initialRole => {
        let roleSection = document.getElementById(initialRole.id);
        roleSection = roleSection.id;
        fetch(apiEndPoint)
            .then((response) => response.json())
            .then((data) => {
                if (data.roles == '') {
                    roleSection.innerHTML = "<span class='text-danger'>No Role Found ! </span>";
                    return false;
                }
                data.roles.forEach(role => {
                    $("#" + roleSection).append(`
                    <option data-uuid="${ null }" value="${role.id}">${role.name} ( ${role.appliction_name ? role.appliction_name : 'SYSTEM'} )</option>
            `)
                })
                $(roleSection).select2();
            })
            .catch((error) => {
                console.error('Error:', error);
            });
    })
}
//// End Role Component



//// Start User Component



function getUserServiceNumber(element) {

    const imgDomain = "http://aims.baf.org/storage/";
    let id = element.id;
    let serviceNumber   = element.value;
    let infoContent = "info_" + element.dataset.info_content;
    let usernameContent = element.dataset.name_content + "_name";
    let useridContent = element.dataset.name_content + "_id";
    let apiEndPoint   = officeApi + "/get_user_info" + "/" + serviceNumber;
    let userInfoContent = document.getElementById(infoContent);

    $(document).find('#' + usernameContent).val('*');

    if (serviceNumber.length < 4) {
        userInfoContent.innerHTML = "<span class='text-danger'>Need greater then 3 digit!</span>"
        return false;
    }

    fetch(apiEndPoint)
        .then((response) => response.json())
        .then((data) => {
            let officeInfo = data.userInformation.office;


            if(data.userInformation == null){
                userInfoContent.innerHTML = "<span class='text-danger'>No User Found ! </span>";
                return false;
            }
            let imagePath = imgDomain + data.userInformation.profile_photo_path;

            $(document).find('#' + useridContent).val(data.userInformation.id);

            userInfoContent.innerHTML = `
            <div class="card card-body mt-3 p-2">
                    <div class="media">
                        <div class="mr-3 align-items-center">
                            <a href="#">
                                <img src="${imagePath}" class="rounded" width="60" height="70" alt="">
                            </a>
                        </div>

                        <div class="media-body">
                            <div class="font-weight-bold username">${data.userInformation.name }</div>
                            <div class="font-weight-semibold">${data.userInformation.rank }</div>
                            <div class="font-weight-semibold">${officeInfo ? officeInfo.name : ''}</div>
                            <div class="font-weight-semibold">${officeInfo ? officeInfo.baseorunit : ''}</div>

                        </div>

                        <div class="ml-3 align-self-center">
                            <span class="badge badge-mark bg-success border-success"></span>
                        </div>
                    </div>
                </div>`;
            getUserName(element , usernameContent)
        })
        .catch((error) => {
            console.error('Error:', error);
        });
}


function getUserName(element , usernameContent){
    let
    el = element.target,
    sectionRow = $(el).closest('.section-row'),
    name = "*";

    if($(document).find(".username").text() != "")
    {
        name = $(document).find(".username").text();
    }


    $(document).find('#' + usernameContent).val(name);
}


//// End User Component





