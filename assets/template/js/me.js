const flashdata = $(".flashdata").data("flashdata");
if (flashdata == true) {
	Swal.fire({
		title: "Data Berhasil " + flashdata,
		text: "",
		type: "success",
	});
}
