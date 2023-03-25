@echo off

rem Delete any existing tree.txt file
if exist README.md (
  del README.md
)

rem Generate the directory listing in tree view
tree /a /f > README.md

rem Delete the first 6 rows of the file
more +6 README.md > tree_temp.txt
del README.md
ren tree_temp.txt README.md

rem Print a message indicating that the operation is complete
echo Directory listing has been updated in tree.txt.

rem Add a 1-second delay
timeout /t 1 > nul

rem Pause before closing the Command Prompt window
pause > nul

rem Close the Command Prompt window
exit
