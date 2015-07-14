cd ..
eval `ssh-agent -k`
eval `ssh-agent -s`
ssh-add $1
git fetch --all 
git reset --hard origin/$2 
eval `ssh-agent -k`
