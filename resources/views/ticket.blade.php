<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title></title>
</head>
<style>
	tr,td{
		padding:10px;
	}
</style>
<body style="font-family: vazir;padding: 0;box-sizing: border-box;direction:rtl">
	<table style="background-color: #fafafa;width: 100%;margin: auto;border-collapse: collapse;">
		<tbody>
			<tr style="padding: 0">
				<td style="padding: 2px 10px;color: white;background-color: #09A9CD;font-size: 25px;">گروه آموزشی دیدنو</td>
				<td style="padding: 2px 10px;text-align: left;color: white;background-color: #09A9CD;"><img src="img/logo.png" alt=""></td>
				<td style="padding: 2px 10px;width: 220px;color: white;background-color: #09A9CD;opacity: .5;font-size: 30px;border-right:1px dashed white;">{{ DateHelper::setToJalaliDate($event->date) }}</td>
			</tr>
			<tr>
				<td style="color: #09A9CD;font-size:12px" >نام و نام خانوادگی: <strong>{{ $user->fullname }}</strong></td>
				<td style="color: #09A9CD;font-size:12px" >عنوان رویداد: <strong>{{ $event->title }}</strong></td>
				<td style="color: #09A9CD;border-right:1px dashed #09A9CD;font-size:12px">کد بلیت: <strong>{{ $ticket->code }}</strong></td>
			</tr>
			<tr>
				<td style="color: #09A9CD;font-size:12px" >شماره ملی: <strong>{{ $user->SN }}</strong></td>
				<td style="color: #09A9CD;font-size:12px" >زمان رویداد: <strong>{{ DateHelper::setToJalaliDate($event->date) }}</strong></td>
				<td style="border-right:1px dashed #09A9CD;padding-right: 40px;" rowspan="3"><img src="{{ public_path($ticket->QR) }}" alt=""></td>
			</tr>
			<tr>
				<td style="color: #09A9CD;font-size:12px" >رشته: <strong>{{ $user->major }}</strong></td>
				<td style="color: #09A9CD;font-size:12px" >مکان: <strong>{{ $event->location }}</strong></td>
			</tr>
			<tr>
				<td style="color: #09A9CD;font-size:12px" colspan="2">دانشگاه: <strong>{{ $user->university }}</strong></td>
			</tr>
			<tr style="padding: 0">
				<td style="padding: 2px 5px;font-size: 12px;color: white;background-color: #09A9CD;" colspan="2">ارایه بلیت جهت شرکت در رویداد الزامی می باشد</td>
				<td style="padding: 2px 30px;color: white;background-color: #09A9CD;opacity: .5;border-right:1px dashed white;">www.dideno2018.ir</td>
			</tr>
		</tbody>
	</table>
</body>
</html>