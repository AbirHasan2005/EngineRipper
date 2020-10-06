#!/usr/bin/env php
<?php
/* GINF - GitHub Information Gathering
 * author: DedSecTL
 * telegram: @dtlily
 * line: dtl.lily
 * team: BlackHole Security
 */
$red = "\033[1;91m";
$green = "\033[1;92m";
$yellow = "\033[1;93m";
$blue = "\033[1;94m";
$white = "\033[1;97m";
$cyan = "\033[1;96m";
$normal = "\033[0m";
$ua = "Mozilla/5.0 (Linux; Android 5.1.1; Andromax A16C3H Build/LMY47V) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.111 Mobile Safari/537.36";
$banner = "$green
 ____                      _
/ ___|  ___  __ _ _ __ ___| |__
\___ \ / _ \/ _` | '__/ __| '_ \
 ___) |  __/ (_| | | | (__| | | |
|____/ \___|\__,_|_|  \___|_| |_|

$cyan   Search Tool $blue v2.4 $normal\n\n";
$about = "$white
About
-----
GINF - Github Information Gathering
Author : DedSecTL <dtlily>
Version : 1.0
Team : BlackHole Security
Date : Fri Aug 17 07:48:19 2018
Telegram : @dtlily
Line : dtl.lily$normal\n\n";
$help = "$white
Command         Description
---------------------------------------$cyan
clear$white           Clear the screen$cyan
banner$white          Show banner$cyan
getuser$white         Get user information$cyan
getrepos$white        Get repos information$cyan
getfower$white        Get follower information$cyan
getfowin$white        Get following information$cyan
exit$white            Exit the Search Tool$normal\n\n";
echo $banner;
echo "$white       Type '$cyan help$white ' for more information$normal\n\n";
while (True) {
	$userInput = readline("Search >>> ");
	readline_add_history($userInput);
	if($userInput == "help") {
		echo $help;
	} elseif($userInput == "clear") {
		system("clear");
	} elseif($userInput == "banner") {
		echo $banner."\n";
	} elseif($userInput == "getuser") {
		echo "Usage: getuser <username>\n";
	} elseif($userInput == "getrepos") {
		echo "Usage: getrepos <username> <reponame>\n";
	} elseif($userInput == "getfower") {
		echo "Usage: getfower <username>\n";
	} elseif($userInput == "getfowin") {
		echo "Usage: getfowin <username>\n";
	} elseif(preg_match('/getuser/', $userInput)) {
		if(explode(' ', $userInput)[0] == "getuser" && count(explode(' ', $userInput)) == 2) {
			$url = "https://api.github.com/users/".explode(' ', $userInput)[1];
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($ch, CURLOPT_USERAGENT, $ua);
			$res = curl_exec($ch);
			curl_close($ch);
			if($res != NULL && count(explode(' ', $res)) != 1) {
				$data = json_decode($res, 1);
				echo "\n[+] User Information\n";
				echo "Login: ".$data["login"]."\n";
				echo "ID: ".$data["id"]."\n";
				echo "Node ID: ".$data["node_id"]."\n";
				echo "Avatar URL: ".$data["avatar_url"]."\n";
				echo "Gravatar ID: ".$data["gravatar_id"]."\n";
				echo "URL: ".$data["url"]."\n";
				echo "HTML URL: ".$data["html_url"]."\n";
				echo "Type: ".$data["type"]."\n";
				echo "Site Admin: ".$data["site_admin"]."\n";
				echo "Name: ".$data["name"]."\n";
				echo "Company: ".$data["company"]."\n";
				echo "Blog: ".$data["blog"]."\n";
				echo "Location: ".$data["location"]."\n";
				echo "Email: ".$data["email"]."\n";
				echo "Hireable: ".$data["hireable"]."\n";
				echo "Bio: ".$data["bio"]."\n";
				echo "Public repos: ".$data["public_repos"]."\n";
				echo "Public gists: ".$data["public_gists"]."\n";
				echo "Followers: ".$data["followers"]."\n";
				echo "Following: ".$data["following"]."\n";
				echo "Created at: ".$data["created_at"]."\n";
				echo "Updated at: ".$data["updated_at"]."\n\n";
			} else {
				echo "[!] NetworkError: Network is unreachable\n";
			}
		} else {
			//pass
		}
	} elseif(preg_match('/getrepos/', $userInput)) {
		if(explode(' ', $userInput)[0] == "getrepos" && count(explode(' ', $userInput)) == 2) {
			$url = "https://api.github.com/users/".explode(' ', $userInput)[1]."/repos?per_page=999";
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($ch, CURLOPT_USERAGENT, $ua);
			$res = curl_exec($ch);
			curl_close($ch);
			if($res != NULL && count(explode(' ', $res)) != 1) {
				$data = json_decode($res, 1);
				echo "\n[+] Repos Information\n";
				for($x = 0;$x < count($data);$x++) {
					echo "ID: ".$data[$x]["id"]."\n";
					echo "Node ID: ".$data[$x]["node_id"]."\n";
					echo "Name: ".$data[$x]["name"]."\n";
					echo "Full Name: ".$data[$x]["full_name"]."\n";
					echo "Owner: ".$data[$x]["owner"]["login"]."\n";
					echo "Private: ".$data[$x]["private"]."\n";
					echo "HTML URL: ".$data[$x]["html_url"]."\n";
					echo "Description: ".$data[$x]["description"]."\n";
					echo "Fork: ".$data[$x]["fork"]."\n";
					echo "Homepage: ".$data[$x]["homepage"]."\n";
					echo "Size: ".$data[$x]["size"]."\n";
					echo "Stars: ".$data[$x]["stargazers_count"]."\n";
					echo "Watchers: ".$data[$x]["watchers"]."\n";
					echo "Language: ".$data[$x]["language"]."\n";
					echo "Issues: ".$data[$x]["has_issues"]."\n";
					echo "Projects: ".$data[$x]["has_projects"]."\n";
					echo "Downloads: ".$data[$x]["has_downloads"]."\n";
					echo "Wiki: ".$data[$x]["has_wiki"]."\n";
					echo "Pages: ".$data[$x]["has_pages"]."\n";
					echo "Mirror URL: ".$data[$x]["mirror_url"]."\n";
					echo "Archived: ".$data[$x]["archived"]."\n";
					echo "License: ".$data[$x]["license"]."\n";
					echo "Forks: ".$data[$x]["forks"]."\n";
					echo "Open issues: ".$data[$x]["open_issues"]."\n";
					echo "Default branch: ".$data[$x]["default_branch"]."\n\n";
				}
			} else {
				echo "[!] NetworkError: Network is unreachable\n";
			}
		} elseif(explode(' ', $userInput)[0] == "getrepos" && count(explode(' ', $userInput)) == 3) {
			$url = "https://api.github.com/users/".explode(' ', $userInput)[1]."/repos?per_page=999";
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($ch, CURLOPT_USERAGENT, $ua);
			$res = curl_exec($ch);
			curl_close($ch);
			if($res != NULL && count(explode(' ', $res)) != 1) {
				$data = json_decode($res, 1);
				echo "\n[+] Repos Information\n";
				for($x = 0;$x < count($data);$x++) {
					if($data[$x]["name"] == explode(' ', $userInput)[2]) {
						echo "ID: ".$data[$x]["id"]."\n";
						echo "Node ID: ".$data[$x]["node_id"]."\n";
						echo "Name: ".$data[$x]["name"]."\n";
						echo "Full Name: ".$data[$x]["full_name"]."\n";
						echo "Owner: ".$data[$x]["owner"]["login"]."\n";
						echo "Private: ".$data[$x]["private"]."\n";
						echo "HTML URL: ".$data[$x]["html_url"]."\n";
						echo "Description: ".$data[$x]["description"]."\n";
						echo "Fork: ".$data[$x]["fork"]."\n";
						echo "Homepage: ".$data[$x]["homepage"]."\n";
						echo "Size: ".$data[$x]["size"]."\n";
						echo "Stars: ".$data[$x]["stargazers_count"]."\n";
						echo "Watchers: ".$data[$x]["watchers"]."\n";
						echo "Language: ".$data[$x]["language"]."\n";
						echo "Issues: ".$data[$x]["has_issues"]."\n";
						echo "Projects: ".$data[$x]["has_projects"]."\n";
						echo "Downloads: ".$data[$x]["has_downloads"]."\n";
						echo "Wiki: ".$data[$x]["has_wiki"]."\n";
						echo "Pages: ".$data[$x]["has_pages"]."\n";
						echo "Mirror url: ".$data[$x]["mirror_url"]."\n";
						echo "Archived: ".$data[$x]["archived"]."\n";
						echo "License: ".$data[$x]["license"]."\n";
						echo "Forks: ".$data[$x]["forks"]."\n";
						echo "Open issues: ".$data[$x]["open_issues"]."\n";
						echo "Default branch: ".$data[$x]["default_branch"]."\n\n";
					}
				}
			} else {
				echo "[!] NetworkError: Network is unreachable\n";
			}
		} else {
			//pass
		}
	} elseif(preg_match('/getfower/', $userInput)) {
		if(explode(' ', $userInput)[0] == "getfower" && count(explode(' ', $userInput)) == 2) {
			$url = "https://api.github.com/users/".explode(' ', $userInput)[1]."/followers?per_page=999";
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($ch, CURLOPT_USERAGENT, $ua);
			$res = curl_exec($ch);
			curl_close($ch);
			if($res != NULL && count(explode(' ', $res)) != 1) {
				$data = json_decode($res, 1);
				echo "\n[+] Followers Information\n";
				for($x = 0;$x < count($data);$x++) {
					echo "Login: ".$data[$x]["login"]."\n";
					echo "ID: ".$data[$x]["id"]."\n";
					echo "Node ID: ".$data[$x]["node_id"]."\n";
					echo "Avatar URL: ".$data[$x]["avatar_url"]."\n";
					echo "Gravatar ID: ".$data[$x]["gravatar_id"]."\n";
					echo "HTML URL: ".$data[$x]["html_url"]."\n";
					echo "Type: ".$data[$x]["type"]."\n";
					echo "Site Admin: ".$data[$x]["site_admin"]."\n\n";
				}
			} else {
				echo "[!] NetworkError: Network is unreachable\n";
			}
		} else {
			//pass
		}
	} elseif(preg_match('/getfowin/', $userInput)) {
		if(explode(' ', $userInput)[0] == "getfowin" && count(explode(' ', $userInput)) == 2) {
			$url = "https://api.github.com/users/".explode(' ', $userInput)[1]."/following?per_page=999";
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($ch, CURLOPT_USERAGENT, $ua);
			$res = curl_exec($ch);
			curl_close($ch);
			if($res != NULL && count(explode(' ', $res)) != 1) {
				$data = json_decode($res, 1);
				echo "\n[+] Following Information\n";
				for($x = 0;$x < count($data);$x++) {
					echo "Login: ".$data[$x]["login"]."\n";
					echo "ID: ".$data[$x]["id"]."\n";
					echo "Node ID: ".$data[$x]["node_id"]."\n";
					echo "Avatar URL: ".$data[$x]["avatar_url"]."\n";
					echo "Gravatar ID: ".$data[$x]["gravatar_id"]."\n";
					echo "HTML URL: ".$data[$x]["html_url"]."\n";
					echo "Type: ".$data[$x]["type"]."\n";
					echo "Site Admin: ".$data[$x]["site_admin"]."\n\n";
				}
			} else {
				echo "[!] NetworkError: Network is unreachable\n";
			}
		} else {
			//pass
		}
	} elseif($userInput == "about") {
		echo $about;
	} elseif($userInput == "exit" || $userInput == "quit") {
		echo $normal;break;
	} else {
		//pass
	}
}