#!/usr/bin/perl -wT
use CGI ':standard';
print "Content-type: text/html\n\n";


use CGI::Carp qw ( fatalsToBrowser ); 
use File::Basename; 
$CGI::POST_MAX = 1024 * 5000; 


$fn = param ('fname');
$ln = param ('lname');
$street = param ('streetName');
$city = param ('city');
$pc = param ('postalCode');
$prov = param ('province');
$phone = param ('phone');
$email = param ('email');

my $safe_filename_characters = "a-zA-Z0-9_.-"; 
my $upload_dir = "/home/ajcastan/public_html/upload"; 
my $query = new CGI; 
my $filename = $query->param("photo"); 
if ( !$filename ) { print $query->header ( ); print "There was a problem uploading your photo (try a smaller file)."; } 
my ( $name, $path, $extension ) = fileparse ( $filename, '\..*' ); 
$filename = $name . $extension; 
$filename =~ tr/ /_/; 
$filename =~ s/[^$safe_filename_characters]//g; 
if ( $filename =~ /^([$safe_filename_characters]+)$/ ) { $filename = $1; } else { die "Filename contains invalid characters"; } 
my $upload_filehandle = $query->upload("photo"); 
open ( UPLOADFILE, ">$upload_dir/$filename" ) or die "$!"; binmode UPLOADFILE; 
while ( <$upload_filehandle> ) { print UPLOADFILE; } 
close UPLOADFILE; 




if ($fn !~ /^[A-Z][a-z]+$/){$fn = '*Wrong Format- Make sure it starts with a captial and is all letters.*';} 
if ($ln !~ /^[A-Z][a-z]+$/){$ln = '*Wrong Format-Make sure it starts with a captial and is all letters.*';} 
if ($city !~ /^[A-Z][a-z]+$/){$city = '*Wrong Format-Make sure it starts with a captial and is all letters.*';} 
if ($phone !~ /^[0-9]{10}$/){$phone = '*Wrong Format*';} 
if ($pc !~ /[A-Za-z][0-9][A-Za-z]+\s[0-9][A-Za-z][0-9]/){$pc = '*Wrong Format-Wrong Postal Code*';} 
if ($email !~ /^[a-z0-9]([a-z0-9.]+[a-z0-9])?\@[a-z0-9.-]+$/){$email = '*Wrong Format*';} 




print <<END_HTML; 
<!DOCTYPE html> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<title>Lab07b.cgi</title> 
</head> 
<body> 
<style>
img {
  display: block;
  margin-left: auto;
  margin-right: auto;
}
</style>
<h1 style="text-align: center;color:blue;font-family:Arial, Helvetica, sans-serif;font-size:4em;">Your Information:</h1>
<div style="display: flex; justify-content: center">
<p style='text-align:center;color:blue;font-family:Arial, Helvetica, sans-serif;font-size:2em;'> 
			First name: $fn<br>
            Last name: $ln<br>
			Street Name: $street<br>
            City: $city<br>
            Province: $prov<br>
            Postal Code: $pc<br>
			Phone Number: $phone<br>
            Email: $email<br>            
        </p>
</div>
<p><img src="https://www.scs.ryerson.ca/~ajcastan/upload/$filename" alt="Uploaded picture" style="width:50%; height:auto"/></p> 
</body> </html> 
END_HTML