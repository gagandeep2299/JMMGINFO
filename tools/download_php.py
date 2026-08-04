import os
import ssl
import urllib.request

URL = "https://downloads.php.net/~windows/releases/archives/php-8.3.28-nts-Win32-vs16-x64.zip"
DEST = os.path.join(os.path.dirname(__file__), "php", "php.zip")
os.makedirs(os.path.dirname(DEST), exist_ok=True)

ctx = ssl.create_default_context()
for attempt in range(8):
    try:
        print(f"Download attempt {attempt + 1}...")
        req = urllib.request.Request(URL, headers={"User-Agent": "Mozilla/5.0"})
        with urllib.request.urlopen(req, context=ctx, timeout=120) as resp:
            data = resp.read()
        with open(DEST, "wb") as f:
            f.write(data)
        print(f"Saved {len(data)} bytes to {DEST}")
        break
    except Exception as exc:
        print(f"Failed: {exc}")
else:
    raise SystemExit(1)
