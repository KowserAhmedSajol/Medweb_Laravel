var user = {
  info: {
    login_type: "email",
    login: "info@gmial.com",
    name: "Mohammad Abu Sadek",
    avatar:
      "http://103.120.161.54/storage/profile-photos/2020-12-09_20211_8972.jpg",
  },
  office: {
    office_id: 15,
    office_name: "Dte Sup",
  },
  official_info: {
    designation: {
      name: "DDS (Prov), Dte Sup",
      type: "Appointment",
    },
    other: {
      rank: "Wing Commander (Wg Cdr)",
      short_rank: "Wg Cdr",
      personnel_type: "Officer",
      base_or_unit: "Air HQ",
      branch_or_trade: "LOG",
    },
  },
  roles: [
    {
      role_id: "15",
      role_name: "Office Admin",
      is_active_role: "0",
    },
    {
      role_id: "16",
      role_name: "Concern Group Member",
      is_active_role: "1",
    },
  ],
};

splitter = {};
splitter.userProfile = {
  displayImage: function (userImg) {
    let img = document.createElement("img");
    img.setAttribute("src", userImg);
    img.setAttribute("style", "width:52px; height:auto");
    return img;
  },
  displayName: function (name) {
    let userName = document.createTextNode(name);
    let h6 = document.createElement("h6");
    h6.setAttribute("class", "mb-0");
    h6.appendChild(userName);
    return h6;
  },
  displayRank: function (rank) {
    let userRank = document.createTextNode(rank);
    let span = document.createElement("span");
    span.setAttribute("class", "badge bg-indigo mr-1");
    span.appendChild(userRank);
    return span;
  },
  displayDesignation: function (designation) {
    let userDesignation = document.createTextNode(designation);
    let span = document.createElement("span");
    span.setAttribute("class", "badge bg-indigo m-0");
    span.appendChild(userDesignation);
    return span;
  },
  displayUserProfileCard: function (user) {
    let userImg = "";
    let userName = "";
    let userRank = "";
    let userDesignation = "";

    let card = document.createElement("div");
    card.setAttribute(
      "class",
      "card mx-1 my-2 border-primary progressbar-card"
    );

    let appointment = document.createElement("div");
    appointment.setAttribute(
      "class",
      "appointment d-flex justify-content-start pb-2 pl-2 pr-2 mt-1"
    );

    let appointmentImgWrapper = document.createElement("div");
    appointmentImgWrapper.setAttribute("class", "appointment-image pr-2");

    let userInfo = document.createElement("div");
    userInfo.setAttribute("class", "user-info");

    userImg = this.displayImage(user.info.avatar);
    userName = this.displayName(user.info.name);
    userRank = this.displayRank(user.official_info.other.short_rank);
    userDesignation = this.displayDesignation(
      user.official_info.designation.name
    );

    appointmentImgWrapper.appendChild(userImg);
    userInfo.appendChild(userName);
    userInfo.appendChild(userRank);
    userInfo.appendChild(userDesignation);
    appointment.appendChild(appointmentImgWrapper);
    appointment.appendChild(userInfo);
    card.appendChild(appointment);

    return card;
  },
  displayUserProfile: function (user) {
    let userProfile = document.querySelector("#user-profile");
    let userProfileCard = this.displayUserProfileCard(user);
    userProfile.appendChild(userProfileCard);
  },
};

function loadData(user) {
  splitter.userProfile.displayUserProfile(user);
}

loadData(user);
