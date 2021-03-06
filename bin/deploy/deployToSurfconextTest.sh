#/bin/sh
# @todo remove hardcoded user name

if [ -z "$1" ]
then

cat << EOF
Please specify the tag or branch to make a release of.

Examples:
    
    sh bin/deploy/deployToSurfconextTest.sh 0.1.0
    sh bin/deploy/deployToSurfconextTest.sh master
    sh bin/deploy/deployToSurfconextTest.sh develop
EOF
exit 1
else
    TAG=$1
fi

# Make a new release
bin/makeRelease.sh ${TAG}

# Copy release to test server
scp ~/Releases/OpenConext-serviceregistry-${TAG}.tar.gz lucas@surf-test:/opt/data/test/

# @todo add error handling
# Replace current version with new version and run migrations
ssh lucas@surf-test <<COMMANDS
    cd /opt/data/test
    tar -xzf OpenConext-serviceregistry-${TAG}.tar.gz
    rm OpenConext-serviceregistry-${TAG}.tar.gz
    rm -rf OpenConext-serviceregistry
    mv OpenConext-serviceregistry-${TAG} OpenConext-serviceregistry
    cd /opt/www/serviceregistry
    bin/migrate
COMMANDS