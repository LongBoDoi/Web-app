function get_post_date() {
    let current_date = new Date();
    let year = current_date.getFullYear();
    let month = current_date.getMonth() + 1;
    let date = current_date.getDate();
    let hour = current_date.getHours();
    let minute = current_date.getMinutes();
    let second = current_date.getSeconds();
    return year + "-" + month + "-" + date + " " + hour + ":" + minute + ":" + second;
}