// membuat notif dengan sweet alert
const flashdata = document.querySelector(".flash-data");
const dataflash = flashdata.getAttribute("data-notif");

if (dataflash == "di Tambahkan" || dataflash == "di Ubah") {
	Swal.fire({
		icon: "success",
		title: "Data Berhasil",
		text: "Berhasil " + dataflash,
	});
}
if (dataflash == "di Hapus") {
	Swal.fire("Terhapus!", "Data talah dihapus.", "success");
}

// fungsi untuk hapus saat click trash
const tombolHapus = document.querySelectorAll(".tombol-hapus");
for (const btn of tombolHapus) {
	btn.addEventListener("click", function (e) {
		e.preventDefault();
		const href = this.getAttribute("data-url");
		Swal.fire({
			title: "Hapus?",
			text: "Cancel untuk membatalkan",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Hapus Data!",
		}).then((result) => {
			if (result.isConfirmed) {
				document.location.href = href;
			}
		});
	});
}

function konfhapus() {
	Swal.fire({
		title: "Hapus?",
		text: "Cancel untuk membatalkan",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Hapus Data!",
	}).then((result) => {
		if (result.isConfirmed) {
			document.getElementById("form-hapuspo").submit();
		}
	});
}
