cd ..
eval `ssh-agent -k`
eval `ssh-agent -s`
ssh-add ~/.ssh/id_rsa
git fetch --all 
git reset --hard origin/master 
eval `ssh-agent -k`
