# JMMG INFORTECH - local PHP dev server
$ProjectRoot = $PSScriptRoot
$Port = 8080

$candidates = @(
    "$ProjectRoot\tools\php\php.exe",
    "C:\xampp\php\php.exe",
    "C:\laragon\bin\php\php-8.3.12-Win32-vs16-x64\php.exe",
    "C:\wamp64\bin\php\php8.2.13\php.exe",
    "C:\php\php.exe"
)

$php = $null
foreach ($path in $candidates) {
    if (Test-Path $path) { $php = $path; break }
}
if (-not $php) {
    $cmd = Get-Command php -ErrorAction SilentlyContinue
    if ($cmd) { $php = $cmd.Source }
}

if (-not $php) {
    Write-Host "PHP not found. Install one of:" -ForegroundColor Yellow
    Write-Host "  - XAMPP: https://www.apachefriends.org/"
    Write-Host "  - Or run: winget install PHP.PHP.8.3"
    Write-Host "  - Then run this script again."
    exit 1
}

Write-Host "Starting JMMG INFORTECH at http://localhost:$Port" -ForegroundColor Green
Write-Host "Press Ctrl+C to stop."
Set-Location $ProjectRoot
& $php -S "localhost:$Port" -t $ProjectRoot
