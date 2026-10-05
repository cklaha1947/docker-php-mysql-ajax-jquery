<?php

/*
============================================================
              GIT + GITHUB IMPORTANT COMMANDS
============================================================


------------------------------------------------------------
1. CHECK GIT
------------------------------------------------------------

git --version


------------------------------------------------------------
2. NEW LOCAL PROJECT → NEW EMPTY GITHUB REPOSITORY
------------------------------------------------------------

cd C:\xampp8.3\htdocs\crud1

git init

git add .

git commit -m "Initial commit"

git branch -M main

git remote add origin https://github.com/USERNAME/REPOSITORY.git

git push -u origin main


------------------------------------------------------------
3. NEW LOCAL PROJECT → GITHUB REPOSITORY ALREADY
   HAS README / OTHER FILES
------------------------------------------------------------

If you want to KEEP the GitHub files:

git pull origin main --allow-unrelated-histories

git add .

git commit -m "Merge local project with GitHub"

git push -u origin main


If you DON'T need the existing GitHub files and want
your LOCAL project to replace the GitHub project:

git push -u origin main --force

WARNING:
--force can overwrite the remote main branch.


------------------------------------------------------------
4. CHECK REMOTE REPOSITORY
------------------------------------------------------------

git remote -v


------------------------------------------------------------
5. CHANGE TO ANOTHER GITHUB REPOSITORY
------------------------------------------------------------

If "remote origin already exists":

git remote set-url origin https://github.com/USERNAME/NEW-REPOSITORY.git

git remote -v

git push -u origin main


------------------------------------------------------------
6. CLONE GITHUB PROJECT → LOCAL COMPUTER
------------------------------------------------------------

cd C:\xampp8.3\htdocs

git clone https://github.com/USERNAME/REPOSITORY.git

cd REPOSITORY


------------------------------------------------------------
7. GITHUB → LOCAL (GET LATEST CHANGES)
------------------------------------------------------------

git pull


------------------------------------------------------------
8. LOCAL CODE EDIT → GITHUB
------------------------------------------------------------

After changing/correcting your code:

git status

git add .

git commit -m "Updated code"

git push


Example:

git add .

git commit -m "Fixed student delete issue"

git push


------------------------------------------------------------
9. CHECK CURRENT STATUS
------------------------------------------------------------

git status


------------------------------------------------------------
10. VIEW COMMIT HISTORY
------------------------------------------------------------

git log

Short version:

git log --oneline


------------------------------------------------------------
11. BRANCH
------------------------------------------------------------

Show branches:

git branch

Create branch:

git branch feature-login

Create + switch:

git switch -c feature-login

Switch branch:

git switch main

Delete branch:

git branch -d feature-login


------------------------------------------------------------
12. MERGE BRANCH
------------------------------------------------------------

git switch main

git merge feature-login

git push


------------------------------------------------------------
13. REMOVE FILE FROM STAGING
------------------------------------------------------------

git restore --staged filename.php


------------------------------------------------------------
14. DISCARD LOCAL CHANGES
------------------------------------------------------------

git restore filename.php

WARNING:
This removes uncommitted changes from that file.


------------------------------------------------------------
15. GITHUB AUTHENTICATION
------------------------------------------------------------

git config --global credential.helper manager

Then:

git push

Sign in/select your GitHub account when prompted.


============================================================
              MOST IMPORTANT WORKFLOWS
============================================================


NEW PROJECT → EMPTY GITHUB:

git init
git add .
git commit -m "Initial commit"
git branch -M main
git remote add origin URL
git push -u origin main


GITHUB → NEW COMPUTER:

git clone URL


GITHUB → EXISTING LOCAL PROJECT:

git pull


LOCAL EDIT → GITHUB:

git add .
git commit -m "Updated code"
git push


LOCAL PROJECT → EXISTING GITHUB REPO
(when GitHub already has README etc.):

git pull origin main --allow-unrelated-histories
git add .
git commit -m "Merge local project with GitHub"
git push


LOCAL PROJECT → REPLACE EXISTING GITHUB:

git push -u origin main --force


============================================================
                 SIMPLE MEMORY TRICK
============================================================

GitHub → Local:
git clone       = first time
git pull        = later updates

Local → GitHub:
git add .
git commit
git push


============================================================
              NORMAL DAILY WORKFLOW
============================================================

git pull

# Edit / correct your code

git status

git add .

git commit -m "Fixed code"

git push


NOTE:
If you are the only developer and you only changed the
local code, git pull is not required before every push.

git pull is needed when you want to get changes from GitHub.


============================================================
*/

?>