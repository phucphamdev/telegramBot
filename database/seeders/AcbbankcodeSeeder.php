<?php
	
	namespace Database\Seeders;
	
	use App\Models\Acbbankcode;
	use Illuminate\Database\Seeder;
	
	class AcbbankcodeSeeder extends Seeder
	{
		public function run()
		{
			$data = $this->data();
			
			foreach ($data as $value) {
				Acbbankcode::create([
					'bank' => $value['bank'],
					'bankName' => $value['bankName'],
					'napasBankCode' => $value['napasBankCode'],
					'thumbnail' => $value['thumbnail'],
					'fastTransferSupported' => $value['fastTransferSupported'],
				]);
			}
		}
		
		public function data()
		{
			return [
				[
					"bank"=> "307",
					"bankName"=> "ACB - NH TMCP A CHAU",
					"napasBankCode"=> "970416",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/11_ACB.png",
					"fastTransferSupported"=> true
				],
				[
					"bank"=> "203",
					"bankName"=> "VIETCOMBANK - NH TMCP NGOAI THUONG",
					"napasBankCode"=> "970436",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/28.-vietcombank.png",
					"fastTransferSupported"=> true
				],
				[
					"bank"=> "202",
					"bankName"=> "BIDV - NH TMCP DAU TU VA PHAT TRIEN VN",
					"napasBankCode"=> "970418",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/12.BIDV.png",
					"fastTransferSupported"=> true
				],
				[
					"bank"=> "201",
					"bankName"=> "VIETINBANK - NH TMCP CONG THUONG",
					"napasBankCode"=> "970415",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/10.Vietinbank_log.png",
					"fastTransferSupported"=> true
				],
				[
					"bank"=> "310",
					"bankName"=> "TECHCOMBANK - NH TMCP KY THUONG",
					"napasBankCode"=> "970407",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/06.Techcombank_logo.png",
					"fastTransferSupported"=> true
				],
				[
					"bank"=> "303",
					"bankName"=> "SACOMBANK - NH TMCP SAI GON THUONG TIN",
					"napasBankCode"=> "970403",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/03.sacombank.png",
					"fastTransferSupported"=> true
				],
				[
					"bank"=> "309",
					"bankName"=> "VPBANK - NH TMCP VIET NAM THINH VUONG",
					"napasBankCode"=> "970432",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/25.-VPBank_Ngân_Hàng_Việt_Nam_Thịnh_Vượng_Vector.png",
					"fastTransferSupported"=> true
				],
				[
					"bank"=> "305",
					"bankName"=> "EXIMBANK - NH TMCP XUAT NHAP KHAU",
					"napasBankCode"=> "970431",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/24.eximbank-logo.png",
					"fastTransferSupported"=> true
				],
				[
					"bank"=> "323",
					"bankName"=> "ABBANK - NH TMCP AN BINH",
					"napasBankCode"=> "970425",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/18.ABBank.png",
					"fastTransferSupported"=> true
				],
				[
					"bank"=> "204",
					"bankName"=> "AGRIBANK - NH NONG NGHIEP VA PHAT TRIEN NONG THON",
					"napasBankCode"=> "970405",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/04.Aribank.png",
					"fastTransferSupported"=> true
				],
				[
					"bank"=> "612",
					"bankName"=> "BANGKOK BANK",
					"napasBankCode"=> "",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/58.-bangkok-bank-.png",
					"fastTransferSupported"=> false
				],
				[
					"bank"=> "620",
					"bankName"=> "BANK OF CHINA",
					"napasBankCode"=> "",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/64.-bankofchina_LOGO.png",
					"fastTransferSupported"=> false
				],
				[
					"bank"=> "615",
					"bankName"=> "BANK OF COMMUNICATIONS",
					"napasBankCode"=> "",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/60.-bank-of-communications-bank-of-china.png",
					"fastTransferSupported"=> false
				],
				[
					"bank"=> "659",
					"bankName"=> "BANK OF INDIA",
					"napasBankCode"=> "",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/86.-bank-of-INDIA.png",
					"fastTransferSupported"=> false
				],
				[
					"bank"=> "622",
					"bankName"=> "BANK OF TOKYO - MITSUBISHI",
					"napasBankCode"=> "",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/66.-tokyo-misubishi.png",
					"fastTransferSupported"=> false
				],
				[
					"bank"=> "614",
					"bankName"=> "BNP PARIBAS BANK",
					"napasBankCode"=> "",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/59.-bnp-paribas-.png",
					"fastTransferSupported"=> false
				],
				[
					"bank"=> "601",
					"bankName"=> "BPCEIOM",
					"napasBankCode"=> "",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/52.-BPCE-bank-.png",
					"fastTransferSupported"=> false
				],
				[
					"bank"=> "359",
					"bankName"=> "BVB - NH TMCP BAO VIET",
					"napasBankCode"=> "970438",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/30.-BAOVIETBANK.png",
					"fastTransferSupported"=> true
				],
				[
					"bank"=> "313",
					"bankName"=> "BacABank - NH TMCP Bắc Á",
					"napasBankCode"=> "970409",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/45.-Bac-A_logo.png",
					"fastTransferSupported"=> true
				],
				[
					"bank"=> "611",
					"bankName"=> "CHINA CONSTRUCTION BANK CORP",
					"napasBankCode"=> "",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/57.-china-construction-bank.png",
					"fastTransferSupported"=> false
				],
				[
					"bank"=> "661",
					"bankName"=> "CIMB - NH TNHH MTV CIMB",
					"napasBankCode"=> "422589",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/01.cimb-bank-vietnam-logo.png",
					"fastTransferSupported"=> true
				],
				[
					"bank"=> "605",
					"bankName"=> "CITI BANK",
					"napasBankCode"=> "",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/55.-citi-bank.png",
					"fastTransferSupported"=> false
				],
				[
					"bank"=> "629",
					"bankName"=> "CTBC BANK",
					"napasBankCode"=> "",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/73.-CTBC-(logo).png",
					"fastTransferSupported"=> false
				],
				[
					"bank"=> "619",
					"bankName"=> "DEUTSCHE BANK",
					"napasBankCode"=> "",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/63.-Deutsch-bank-.png",
					"fastTransferSupported"=> false
				],
				[
					"bank"=> "304",
					"bankName"=> "DONGABANK - NH TMCP DONG A",
					"napasBankCode"=> "970406",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/05.-Dong-A.png",
					"fastTransferSupported"=> true
				],
				[
					"bank"=> "630",
					"bankName"=> "FIRST COMMERCIAL BANK",
					"napasBankCode"=> "",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/74.-firstbank.png",
					"fastTransferSupported"=> false
				],
				[
					"bank"=> "320",
					"bankName"=> "GPBANK - NH TM TNHH MTV DAU KHI TOAN CAU",
					"napasBankCode"=> "970408",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/07.GPBank.png",
					"fastTransferSupported"=> true
				],
				[
					"bank"=> "301",
					"bankName"=> "HABUBANK - NH TMCP NHA HA NOI",
					"napasBankCode"=> "",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/42.-Habubank.png",
					"fastTransferSupported"=> false
				],
				[
					"bank"=> "321",
					"bankName"=> "HDBANK - NH TMCP PHAT TRIEN TP.HO CHI MINH",
					"napasBankCode"=> "970437",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/29.-hdbank.png",
					"fastTransferSupported"=> true
				],
				[
					"bank"=> "603",
					"bankName"=> "HLB - NH TNHH MTV HONGLEONG VIET NAM",
					"napasBankCode"=> "970442",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/34.-HLB_hong-leong-bank-squarelogo.png",
					"fastTransferSupported"=> true
				],
				[
					"bank"=> "617",
					"bankName"=> "HSBC - Ngân hàng TNHH MTV HSBC (Việt Nam)",
					"napasBankCode"=> "458761",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/61.-hsbc-.png",
					"fastTransferSupported"=> false
				],
				[
					"bank"=> "640",
					"bankName"=> "HUA NAN COMMERCIAL BANK",
					"napasBankCode"=> "",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/80-huananbank.png",
					"fastTransferSupported"=> false
				],
				[
					"bank"=> "641",
					"bankName"=> "IBK - INDUSTRIAL BANK OF KOREA CN TP.HCM",
					"napasBankCode"=> "",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/43.-IBK_logo.jsp-copy.png",
					"fastTransferSupported"=> false
				],
				[
					"bank"=> "652",
					"bankName"=> "IBK - NH CONG NGHIEP HAN QUOC CN HA NOI",
					"napasBankCode"=> "970455",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/40.-IBK_logo.jsp.png",
					"fastTransferSupported"=> true
				],
				[
					"bank"=> "649",
					"bankName"=> "INDUSTRIAL AND COMMERCIAL BANK OF CHINA",
					"napasBankCode"=> "",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/83-Industrial-Commercial-Bank-of-China-.png",
					"fastTransferSupported"=> false
				],
				[
					"bank"=> "502",
					"bankName"=> "IVB - NH TNHH INDOVINA",
					"napasBankCode"=> "970434",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/27.-IVB_logo.png",
					"fastTransferSupported"=> true
				],
				[
					"bank"=> "627",
					"bankName"=> "JPMORGAN CHASE BANK",
					"napasBankCode"=> "",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/71.-jpmorgan_logo.png",
					"fastTransferSupported"=> false
				],
				[
					"bank"=> "626",
					"bankName"=> "KEB HANA BANK",
					"napasBankCode"=> "",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/85-KEB-hanabank-Han-Quoc-.png",
					"fastTransferSupported"=> false
				],
				[
					"bank"=> "701",
					"bankName"=> "KHO BAC NHA NUOC",
					"napasBankCode"=> "",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/87.-kho-bac-nha-nuoc.png",
					"fastTransferSupported"=> false
				],
				[
					"bank"=> "353",
					"bankName"=> "KLB - NH TMCP KIEN LONG",
					"napasBankCode"=> "970452",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/38_kienlong.png",
					"fastTransferSupported"=> true
				],
				[
					"bank"=> "631",
					"bankName"=> "KOOKMIN BANK",
					"napasBankCode"=> "",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/75.-kb-kookmin-bank.png",
					"fastTransferSupported"=> false
				],
				[
					"bank"=> "357",
					"bankName"=> "LPB - NH TMCP BUU DIEN LIEN VIET",
					"napasBankCode"=> "970449",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/37.-LPB_logo.png",
					"fastTransferSupported"=> true
				],
				[
					"bank"=> "635",
					"bankName"=> "MALAYAN BANKING BERHAD - CN HCM",
					"napasBankCode"=> "",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/77.-MALAYSIAN-BANK-1.png",
					"fastTransferSupported"=> false
				],
				[
					"bank"=> "302",
					"bankName"=> "MARITIMEBANK - NH TMCP HANG HAI",
					"napasBankCode"=> "970426",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/19.maritime_logo.png",
					"fastTransferSupported"=> true
				],
				[
					"bank"=> "609",
					"bankName"=> "MAY BANK",
					"napasBankCode"=> "",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/56.-MAY-BANK.png",
					"fastTransferSupported"=> false
				],
				[
					"bank"=> "311",
					"bankName"=> "MB - NH TMCP QUAN DOI",
					"napasBankCode"=> "970422",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/15.MBBank_Logo.png",
					"fastTransferSupported"=> true
				],
				[
					"bank"=> "205",
					"bankName"=> "MHB - NH PHAT TRIEN NHA DONG BANG SONG CUU LONG",
					"napasBankCode"=> "",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/44.-MHB_Bank.png",
					"fastTransferSupported"=> false
				],
				[
					"bank"=> "639",
					"bankName"=> "MIZUHO BANK",
					"napasBankCode"=> "",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/79-MIZUHO-BANK.png",
					"fastTransferSupported"=> false
				],
				[
					"bank"=> "306",
					"bankName"=> "NAMABANK - NH TMCP NAM A",
					"napasBankCode"=> "970428",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/21.namabank_logo.png",
					"fastTransferSupported"=> true
				],
				[
					"bank"=> "352",
					"bankName"=> "NCB - NH TMCP QUOC DAN",
					"napasBankCode"=> "970419",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/13.NCB_logo.png",
					"fastTransferSupported"=> true
				],
				[
					"bank"=> "901",
					"bankName"=> "NGAN HANG HOP TAC",
					"napasBankCode"=> "",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/88.-Co-op-bank---ngan-hang-hop-tac.png",
					"fastTransferSupported"=> false
				],
				[
					"bank"=> "207",
					"bankName"=> "NH CHINH SACH XA HOI",
					"napasBankCode"=> "",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/47.-Ngan_hang_CSXHVN_logo.png",
					"fastTransferSupported"=> false
				],
				[
					"bank"=> "621",
					"bankName"=> "NH CREDIT AGRICOLE CIB",
					"napasBankCode"=> "",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/65.-Credit-Agricole.png",
					"fastTransferSupported"=> false
				],
				[
					"bank"=> "650",
					"bankName"=> "NH DBS BANK LTD",
					"napasBankCode"=> "",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/84-dbs-bank-logo.png",
					"fastTransferSupported"=> false
				],
				[
					"bank"=> "648",
					"bankName"=> "NH DT&PT CAMPUCHIA",
					"napasBankCode"=> "",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/82-DT-PT-Campuchia-.png",
					"fastTransferSupported"=> false
				],
				[
					"bank"=> "656",
					"bankName"=> "NH HANA HAN QUOC",
					"napasBankCode"=> "",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/85-KEB-hanabank-Han-Quoc-.png",
					"fastTransferSupported"=> false
				],
				[
					"bank"=> "628",
					"bankName"=> "NH LIEN DOANH LAO - VIET",
					"napasBankCode"=> "",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/72.-LIEN-DOANH-LAO-VIET-.png",
					"fastTransferSupported"=> false
				],
				[
					"bank"=> "623",
					"bankName"=> "NH MEGA ICBC",
					"napasBankCode"=> "",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/67.-mega-international-commercial-bank-squarelogo-1451306131958.png",
					"fastTransferSupported"=> false
				],
				[
					"bank"=> "642",
					"bankName"=> "NH TAIPEI FUBON COMMERCIAL BANK",
					"napasBankCode"=> "",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/81-taiwan-fubon.png",
					"fastTransferSupported"=> false
				],
				[
					"bank"=> "315",
					"bankName"=> "NH TMCP VUNG TAU",
					"napasBankCode"=> "",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/48.TMCP-VT.png",
					"fastTransferSupported"=> false
				],
				[
					"bank"=> "339",
					"bankName"=> "NH TMCP XAY DUNG VIET NAM",
					"napasBankCode"=> "",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/50.-NH-TMCP-XÂY-DỰNG-VIỆT-NAM.png",
					"fastTransferSupported"=> false
				],
				[
					"bank"=> "602",
					"bankName"=> "NH TNHH ANZ VIET NAM",
					"napasBankCode"=> "",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/53.-anz-.png",
					"fastTransferSupported"=> false
				],
				[
					"bank"=> "333",
					"bankName"=> "OCB - NH TMCP PHUONG DONG",
					"napasBankCode"=> "970448",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/36.-OCB_logo.png",
					"fastTransferSupported"=> true
				],
				[
					"bank"=> "319",
					"bankName"=> "OCEANBANK - NH TMCP DAI DUONG",
					"napasBankCode"=> "970414",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/09.Oceanbank_logo.png",
					"fastTransferSupported"=> true
				],
				[
					"bank"=> "625",
					"bankName"=> "OVERSEA-CHINESE BANKING",
					"napasBankCode"=> "",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/69.-OVERSEA-CHINESE-BANKING.png",
					"fastTransferSupported"=> false
				],
				[
					"bank"=> "501",
					"bankName"=> "PBVN - NH TNHH MTV PUBLIC VIET NAM",
					"napasBankCode"=> "970439",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/31.-public-bank.png",
					"fastTransferSupported"=> true
				],
				[
					"bank"=> "341",
					"bankName"=> "PGBANK - NH TMCP XANG DAU PETROLIMEX",
					"napasBankCode"=> "970430",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/23.PGBank_Logo.png",
					"fastTransferSupported"=> true
				],
				[
					"bank"=> "346",
					"bankName"=> "PVCOMBANK - NH TMCP DAI CHUNG VIET NAM",
					"napasBankCode"=> "970412",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/08.Pvcombank.png",
					"fastTransferSupported"=> true
				],
				[
					"bank"=> "308",
					"bankName"=> "SAIGONBANK - NH TMCP SAI GON CONG THUONG",
					"napasBankCode"=> "970400",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/02.saigon-TMCP-Congthuong.png",
					"fastTransferSupported"=> true
				],
				[
					"bank"=> "334",
					"bankName"=> "SCB - NH TMCP SAI GON",
					"napasBankCode"=> "970429",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/22.SCB_Logo.png",
					"fastTransferSupported"=> true
				],
				[
					"bank"=> "317",
					"bankName"=> "SEABANK - NH TMCP DONG NAM A",
					"napasBankCode"=> "970440",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/32.-Seabank_logo.png",
					"fastTransferSupported"=> true
				],
				[
					"bank"=> "348",
					"bankName"=> "SHB - NH TMCP SAI GON - HA NOI",
					"napasBankCode"=> "970443",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/35.-SHB_Logo.png",
					"fastTransferSupported"=> true
				],
				[
					"bank"=> "616",
					"bankName"=> "SHBVN - NH TNHH MTV SHINHAN VN",
					"napasBankCode"=> "970424",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/17.shinhan-bank-logo.png",
					"fastTransferSupported"=> true
				],
				[
					"bank"=> "632",
					"bankName"=> "SINOPAC BANK",
					"napasBankCode"=> "",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/76.-Bank-Sinopac.png",
					"fastTransferSupported"=> false
				],
				[
					"bank"=> "636",
					"bankName"=> "SUMITOMO MITSUI BANKING CORPOR HCM",
					"napasBankCode"=> "",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/78-SUMITOMO-MITSUI-.png",
					"fastTransferSupported"=> false
				],
				[
					"bank"=> "624",
					"bankName"=> "THE SHANGHAI COMMERCIAL & SAVINGS",
					"napasBankCode"=> "",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/68.-SHANG-HAI-COMMERCIAL-SAVING-BANK.png",
					"fastTransferSupported"=> false
				],
				[
					"bank"=> "504",
					"bankName"=> "THE SIAM COMMERCIAL BANK PUBLIC",
					"napasBankCode"=> "",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/51.-Siam_logo.png",
					"fastTransferSupported"=> false
				],
				[
					"bank"=> "604",
					"bankName"=> "TNHH MTV Standard Chartered Bank (Vietnam) Limited",
					"napasBankCode"=> "970410",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/54.-Standard-Chartered-Bank.png",
					"fastTransferSupported"=> true
				],
				[
					"bank"=> "358",
					"bankName"=> "TPBANK - NH TMCP TIEN PHONG",
					"napasBankCode"=> "970423",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/16.tpbank-logo_11-55-14_379x231.png",
					"fastTransferSupported"=> true
				],
				[
					"bank"=> "618",
					"bankName"=> "UOB - NH TNHH MTV United Overseas Bank",
					"napasBankCode"=> "970458",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/62.-United-overseas-bank-.png",
					"fastTransferSupported"=> true
				],
				[
					"bank"=> "355",
					"bankName"=> "VAB - NH TMCP VIET A",
					"napasBankCode"=> "970427",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/20.VAB-bank_logo.svg.png",
					"fastTransferSupported"=> true
				],
				[
					"bank"=> "208",
					"bankName"=> "VDB - NH PHAT TRIEN VIET NAM",
					"napasBankCode"=> "",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/46.-VDB.png",
					"fastTransferSupported"=> false
				],
				[
					"bank"=> "314",
					"bankName"=> "VIB - NH TMCP QUOC TE VIET NAM",
					"napasBankCode"=> "970441",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/33.-VIB_logo.png",
					"fastTransferSupported"=> true
				],
				[
					"bank"=> "327",
					"bankName"=> "VIET CAPITAL BANK - NH TMCP BAN VIET",
					"napasBankCode"=> "970454",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/39.-VietcapitalBank_Logo.png",
					"fastTransferSupported"=> true
				],
				[
					"bank"=> "356",
					"bankName"=> "VIETBANK - NH TMCP VIET NAM THUONG TIN",
					"napasBankCode"=> "970433",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/26.-VIETBANK-logo.png",
					"fastTransferSupported"=> true
				],
				[
					"bank"=> "505",
					"bankName"=> "VRB - NH LIEN DOANH VIET NGA",
					"napasBankCode"=> "970421",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/14.VRB_Bank.png",
					"fastTransferSupported"=> true
				],
				[
					"bank"=> "637",
					"bankName"=> "WOO - WOORI BANK",
					"napasBankCode"=> "970457",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/41.-WOO_logo.png",
					"fastTransferSupported"=> true
				],
				[
					"bank"=> "662",
					"bankName"=> "NONGHYUP - Chi nhánh HN",
					"napasBankCode"=> "801011",
					"thumbnail"=> "https://apiapp.acb.com.vn/mb/legacy/ss/cs/bankservice/media/bank/DEFAULT.png",
					"fastTransferSupported"=> true
				]
			];
		}
	}
